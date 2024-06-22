<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Locale;
use App\Models\Product;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\AnonymousComponent;

class ProductController extends Controller
{

    const IMAGE_PATH = 'img/products';
    const INSTRUCTION_PATH = 'instructions';

    /**
     * Return filtered paginated products for the request
     *
     * @param \Illuminate\Http\Response $request
     * @return \Illuminate\Database\Eloquest\Collection
     */
    public function filter($request)
    {
        $products = Product::join('product_translations', function ($join) {
            $join->on('products.id', '=', 'product_translations.product_id');
            $join->where('product_translations.locale', '=', app()->getLocale());
        })
            ->select('products.*', 'product_translations.image', 'product_translations.title', 'product_translations.description');

        // filter prescription
        $prescription = $request->prescription;
        if ($prescription != null && $prescription != 'all') {
            $products = $products->where('prescription', $prescription);
        }

        // filter category
        $categorySlug = $request->category;
        $category = Category::where('slug', $categorySlug)->first();

        if ($categorySlug && $categorySlug != 'all') {
            $products = $products->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category->id);
            });
        }

        // Validate pagination appends
        $appendExcepts = ['page', 'token'];
        if ($request->prescription == null || $request->prescription == 'all') {
            array_push($appendExcepts, 'prescription');
        }
        if (!$categorySlug || $categorySlug == 'all') {
            array_push($appendExcepts, 'category');
        }

        $products = $products->orderBy('title')
            ->paginate(12)
            ->appends($request->except($appendExcepts))
            ->fragment('products-section');

        return $products;
    }

    public function index(Request $request)
    {
        $products = $this->filter($request);
        $products->withPath(route('products.index'));

        $popularProducts = Product::where('popular', true)
            ->join('product_translations', function ($join) {
                $join->on('products.id', '=', 'product_translations.product_id');
                $join->where('product_translations.locale', '=', app()->getLocale());
            })
            ->select('products.*', 'product_translations.image', 'product_translations.title', 'product_translations.description')
            ->inRandomOrder()
            ->get();

        $greetingProducts = Product::where('displayOnGreeting', true)->inRandomOrder()->take(6)->get();

        return view('products.index', compact('request', 'products', 'popularProducts', 'greetingProducts'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        $categoryIds = $product->categories()->pluck('id')->toArray();

        $similarProducts = Product::whereHas('categories', function ($q) use ($categoryIds) {
            $q->whereIn('id', $categoryIds);
        })
            ->join('product_translations', function ($join) {
                $join->on('products.id', '=', 'product_translations.product_id');
                $join->where('product_translations.locale', '=', app()->getLocale());
            })
            ->select('products.*', 'product_translations.image', 'product_translations.title', 'product_translations.description')
            ->where('products.id', '!=', $product->id)
            ->inRandomOrder()
            ->get();

        $popularProducts = Product::where('popular', true)
            ->join('product_translations', function ($join) {
                $join->on('products.id', '=', 'product_translations.product_id');
                $join->where('product_translations.locale', '=', app()->getLocale());
            })
            ->select('products.*', 'product_translations.image', 'product_translations.title', 'product_translations.description')
            ->inRandomOrder()
            ->get();

        return view('products.show', compact('product', 'similarProducts', 'popularProducts'));
    }

    public function ajaxGet(Request $request)
    {
        $products = $this->filter($request);
        $products->withPath(route('products.index'));

        return Blade::renderComponent(
            new AnonymousComponent(view('components.products-list'), ['products' => $products])
        );
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::join('product_translations', function ($join) {
            $join->on('products.id', '=', 'product_translations.product_id');
            $join->where('product_translations.locale', '=', app()->getLocale());
        })
            ->where(function ($q) use ($keyword) {
                $q->where('product_translations.title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_translations.description', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_translations.composition', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_translations.indication', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('product_translations.use', 'LIKE', '%' . $keyword . '%');
            })
            ->select('products.*', 'product_translations.title')
            ->orderBy('title')->get();

        return Blade::renderComponent(
            new AnonymousComponent(view('components.filter-search-list'), ['products' => $products])
        );
    }

    public function dashboardIndex(Request $request)
    {
        // Default parameters for ordering
        $orderBy = $request->orderBy ? $request->orderBy : 'title';
        $orderType = $request->orderType ? $request->orderType : 'asc';
        $activePage = $request->page ? $request->page : 1;

        // for search and counter
        $totalItems = Product::join('product_translations', function ($join) {
            $join->on('products.id', '=', 'product_translations.product_id');
            $join->where('product_translations.locale', '=', Locale::getDefaultValueForDash());
        })
            ->select('products.*', 'product_translations.title')
            ->orderBy('title')
            ->get();

        // display as list in table
        $items = Product::join('product_translations', function ($join) {
            $join->on('products.id', '=', 'product_translations.product_id');
            $join->where('product_translations.locale', '=', Locale::getDefaultValueForDash());
        })
            ->select('products.*', 'product_translations.title')
            ->orderBy($orderBy, $orderType)
            ->paginate(30, ['*'], 'page', $activePage)
            ->appends($request->except('page'));

        return view('dashboard.products.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
    }

    public function create()
    {
        $categories = Category::join('category_translations', function ($join) {
            $join->on('categories.id', '=', 'category_translations.category_id');
            $join->where('category_translations.locale', '=', Locale::getDefaultValueForDash());
        })
            ->select('categories.*', 'category_translations.title')
            ->orderBy('title')
            ->get();

        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // same fields for all languages
        $item = new Product();
        $fields = ['prescription', 'popular', 'displayOnGreeting'];
        Helper::fillModelColumns($item, $fields, $request);
        $item->slug = Helper::generateUniqueSlug($request->title, Product::class);
        $item->save();

        $item->categories()->attach($request->categories);

        // store translations
        foreach ($item->translations as $translation) {
            $fields = ['title', 'description', 'composition', 'indication', 'use'];
            Helper::fillModelColumns($translation, $fields, $request);
            $translation->save();
        }

        // upload files and update item columns
        $defaultTranslation = $item->translation(Locale::getDefaultValue());

        Helper::uploadModelsFile($request, $defaultTranslation, 'image', $item->slug . '-' . Locale::getDefaultValue(), self::IMAGE_PATH, 600);
        Helper::createThumb(self::IMAGE_PATH, $defaultTranslation->image, 240);

        Helper::uploadModelsFile($request, $defaultTranslation, 'instruction', $item->slug . '-' . Locale::getDefaultValue(), self::INSTRUCTION_PATH);
        $defaultTranslation->save();

        foreach ($item->translations as $translation) {
            $translation->image = $defaultTranslation->image;
            $translation->instruction = $defaultTranslation->instruction;
            $translation->save();
        }

        return redirect()->route('products.translations', $item->id);
    }

    public function translations(Request $request, $id)
    {
        $item = Product::find($id);

        return view('dashboard.products.translations', compact('item'));
    }

    public function edit(Request $request, $id)
    {
        $locale = $request->locale;
        $item = Product::find($id);

        $categories = Category::join('category_translations', function ($join) {
            $join->on('categories.id', '=', 'category_translations.category_id');
            $join->where('category_translations.locale', '=', Locale::getDefaultValueForDash());
        })
            ->select('categories.*', 'category_translations.title')
            ->orderBy('title')
            ->get();

        return view('dashboard.products.edit', compact('item', 'locale', 'categories'));
    }

    public function update(Request $request)
    {
        // same fields for all languages
        $item = Product::find($request->id);
        $fields = ['prescription', 'popular', 'displayOnGreeting'];
        Helper::fillModelColumns($item, $fields, $request);
        $item->save();

        $item->categories()->detach();
        $item->categories()->attach($request->categories);

        // update translation
        $translation = $item->translation($request->locale);
        $fields = ['title', 'description', 'composition', 'indication', 'use'];
        Helper::fillModelColumns($translation, $fields, $request);
        $translation->save();

        // update product slug if current locale is equal to default locale
        if ($translation->locale == Locale::getDefaultValue()) {
            $item->slug = Helper::generateUniqueSlug($request->title, Product::class, $item->id);
            $item->save();
        }

        // upload files and update item columns
        Helper::uploadModelsFile($request, $translation, 'image', $item->slug . '-' . $translation->locale, self::IMAGE_PATH, 600);
        //create thumb
        if ($request->image) {
            Helper::createThumb(self::IMAGE_PATH, $translation->image, 240);
        }

        Helper::uploadModelsFile($request, $translation, 'instruction', $item->slug . '-' . $translation->locale, self::INSTRUCTION_PATH);
        $translation->save();

        return redirect()->back();
    }

    /**
     * Request for deleting items by id may come in integer type (destroy single item form)
     * or in array type (destroy multiple items form)
     * That`s why we need to get id in array type and delete them by loop
     *
     * Checkout Model Boot methods deleting function
     * Models relations also deleted on deleting function of Models Boot method
     */
    public function destroy(Request $request)
    {
        $ids = (array) $request->id;

        foreach ($ids as $id) {
            Product::find($id)->delete();
        }

        return redirect()->route('dashboard.index');
    }
}
