<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\Request;

class TranslationController extends Controller
{

  public function dashboardIndex()
  {
    // for search and counter
    // Exclude ru value because it`s default value for translations
    $totalItems = Locale::where('value', '!=', 'ru')->get();

    // display as list in table
    $items = Locale::where('value', '!=', 'ru')->get();

    return view('dashboard.translations.index', compact('totalItems', 'items'));
  }

  public function edit(Request $request, $locale)
  {
    $jsonFile = base_path('lang/' . $locale . '.json');
    $jsonContent = file_get_contents($jsonFile);

    return view('dashboard.translations.edit', compact('jsonContent', 'locale'));
  }

  public function viewDefault()
  {
    $jsonFile = base_path('lang\default.json');
    $jsonContent = file_get_contents($jsonFile);

    return '<pre>' . $jsonContent . '</pre>';
  }

  public function update(Request $request)
  {
    $file = base_path('lang/' . $request->locale . '.json');
    file_put_contents($file, $request->content);

    return redirect()->back();
  }

  public function reset(Request $request)
  {
    $defaultFile = base_path('lang/default.json');
    $defaultContent = file_get_contents($defaultFile);

    $file = base_path('lang/' . $request->locale . '.json');
    file_put_contents($file, $defaultContent);

    return redirect()->back();
  }
}
