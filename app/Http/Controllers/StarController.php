<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\Star;
use App\Support\Helper;
use Illuminate\Http\Request;

class StarController extends Controller
{
  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Star::join('star_translations', function ($join) {
      $join->on('stars.id', '=', 'star_translations.star_id');
      $join->where('star_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('stars.*', 'star_translations.title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Star::join('star_translations', function ($join) {
      $join->on('stars.id', '=', 'star_translations.star_id');
      $join->where('star_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('stars.*', 'star_translations.title', 'star_translations.description')
      ->orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.stars.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.stars.create');
  }

  public function store(Request $request)
  {
    $item = new Star();
    $item->save();

    // store translations
    foreach ($item->translations as $translation) {
      $fields = ['title', 'description'];
      Helper::fillModelColumns($translation, $fields, $request);
      $translation->save();
    }

    return redirect()->route('stars.translations', $item->id);
  }

  public function translations(Request $request, $id)
  {
    $item = Star::find($id);

    return view('dashboard.stars.translations', compact('item'));
  }

  public function edit(Request $request, $id)
  {
    $locale = $request->locale;
    $item = Star::find($id);

    return view('dashboard.stars.edit', compact('item', 'locale'));
  }

  public function update(Request $request)
  {
    $item = Star::find($request->id);

    // update translation
    $translation = $item->translation($request->locale);
    $fields = ['title', 'description'];
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
      Star::find($id)->delete();
    }

    return redirect()->route('stars.dashboard.index');
  }
}
