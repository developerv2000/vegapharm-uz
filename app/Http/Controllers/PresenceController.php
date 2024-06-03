<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\Presence;
use App\Support\Helper;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Presence::join('presence_translations', function ($join) {
      $join->on('presences.id', '=', 'presence_translations.presence_id');
      $join->where('presence_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('presences.*', 'presence_translations.title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Presence::join('presence_translations', function ($join) {
      $join->on('presences.id', '=', 'presence_translations.presence_id');
      $join->where('presence_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('presences.*', 'presence_translations.title', 'presence_translations.address')
      ->orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.presence.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.presence.create');
  }

  public function store(Request $request)
  {
    // same fields for all languages
    $item = new Presence();
    $fields = ['type'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->save();

    // store translations
    foreach ($item->translations as $translation) {
      $fields = ['title', 'address', 'phone', 'email'];
      Helper::fillModelColumns($translation, $fields, $request);
      $translation->save();
    }

    return redirect()->route('presence.translations', $item->id);
  }

  public function translations(Request $request, $id)
  {
    $item = Presence::find($id);

    return view('dashboard.presence.translations', compact('item'));
  }

  public function edit(Request $request, $id)
  {
    $locale = $request->locale;
    $item = Presence::find($id);

    return view('dashboard.presence.edit', compact('item', 'locale'));
  }

  public function update(Request $request)
  {
    // same fields for all languages
    $item = Presence::find($request->id);
    $fields = ['type'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->save();

    // update translation
    $translation = $item->translation($request->locale);
    $fields = ['title', 'address', 'phone', 'email'];
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
      Presence::find($id)->delete();
    }

    return redirect()->route('presence.dashboard.index');
  }
}
