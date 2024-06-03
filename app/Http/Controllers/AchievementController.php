<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Locale;
use App\Support\Helper;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
  const IMAGE_PATH = 'img/achievements';

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'year';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Achievement::join('achievement_translations', function ($join) {
      $join->on('achievements.id', '=', 'achievement_translations.achievement_id');
      $join->where('achievement_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('achievements.*', 'achievement_translations.title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Achievement::join('achievement_translations', function ($join) {
      $join->on('achievements.id', '=', 'achievement_translations.achievement_id');
      $join->where('achievement_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('achievements.*', 'achievement_translations.title')
      ->orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.achievements.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.achievements.create');
  }

  public function store(Request $request)
  {
    // same fields for all languages
    $item = new Achievement();
    $fields = ['year'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->image = 'uploading';
    $item->save();

    // store translations
    foreach ($item->translations as $translation) {
      $fields = ['title'];
      Helper::fillModelColumns($translation, $fields, $request);
      $translation->save();
    }

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', uniqid(), self::IMAGE_PATH, 300);
    $item->save();

    return redirect()->route('achievements.translations', $item->id);
  }

  public function translations(Request $request, $id)
  {
    $item = Achievement::find($id);

    return view('dashboard.achievements.translations', compact('item'));
  }

  public function edit(Request $request, $id)
  {
    $locale = $request->locale;
    $item = Achievement::find($id);

    return view('dashboard.achievements.edit', compact('item', 'locale'));
  }

  public function update(Request $request)
  {
    // same fields for all languages
    $item = Achievement::find($request->id);
    $fields = ['year'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->save();

    // update translation
    $translation = $item->translation($request->locale);
    $fields = ['title'];
    Helper::fillModelColumns($translation, $fields, $request);
    $translation->save();

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', uniqid(), self::IMAGE_PATH, 300);
    $item->save();

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
      Achievement::find($id)->delete();
    }

    return redirect()->route('achievements.dashboard.index');
  }
}
