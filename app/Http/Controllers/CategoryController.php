<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Locale;
use App\Support\Helper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Category::join('category_translations', function ($join) {
      $join->on('categories.id', '=', 'category_translations.category_id');
      $join->where('category_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('categories.*', 'category_translations.title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Category::join('category_translations', function ($join) {
      $join->on('categories.id', '=', 'category_translations.category_id');
      $join->where('category_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('categories.*', 'category_translations.title')
      ->withCount('products')
      ->orderBy($orderBy, $orderType)
      ->paginate(60, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.categories.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.categories.create');
  }

  public function store(Request $request)
  {
    $item = new Category();
    $item->save();

    // store translations
    foreach($item->translations as $translation) {
      $fields = ['title'];
      Helper::fillModelColumns($translation, $fields, $request);
      $translation->save();
    }

    return redirect()->route('categories.translations', $item->id);
  }

  public function translations(Request $request, $id)
  {
    $item = Category::find($id);

    return view('dashboard.categories.translations', compact('item'));
  }

  public function edit(Request $request, $id)
  {
    $locale = $request->locale;
    $item = Category::find($id);

    return view('dashboard.categories.edit', compact('item', 'locale'));
  }

  public function update(Request $request)
  {
    $item = Category::find($request->id);

    // update translation
    $translation = $item->translation($request->locale);
    $fields = ['title'];
    Helper::fillModelColumns($translation, $fields, $request);
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
      Category::find($id)->delete();
    }

    return redirect()->route('categories.dashboard.index');
  }
}
