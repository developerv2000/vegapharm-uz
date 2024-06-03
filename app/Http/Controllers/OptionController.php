<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\Option;
use App\Support\Helper;
use Illuminate\Http\Request;

class OptionController extends Controller
{
  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Option::orderBy('title')->get();

    // display as list in table
    $items = Option::join('option_translations', function ($join) {
      $join->on('options.id', '=', 'option_translations.option_id');
      $join->where('option_translations.locale', '=', Locale::getDefaultValueForDash());
    })
      ->select('options.*', 'option_translations.value')
      ->orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.options.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function translations(Request $request, $id)
  {
    $item = Option::find($id);

    return view('dashboard.options.translations', compact('item'));
  }

  public function edit(Request $request, $id)
  {
    $locale = $request->locale;
    $item = Option::find($id);

    return view('dashboard.options.edit', compact('item', 'locale'));
  }

  public function update(Request $request)
  {
    $item = Option::find($request->id);

    // update translation
    $translation = $item->translation($request->locale);
    $fields = ['value'];
    Helper::fillModelColumns($translation, $fields, $request);
    $translation->save();

    return redirect()->back();
  }
}
