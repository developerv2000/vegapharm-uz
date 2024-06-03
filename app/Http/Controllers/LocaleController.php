<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LocaleController extends Controller
{
  public function dashboardIndex(Request $request)
  {
    // for search and counter
    $totalItems = Locale::all();

    // display as list in table
    $items = Locale::orderBy('title')->get();

    return view('dashboard.locales.index', compact('totalItems', 'items'));
  }

  public function create()
  {
    $locales = Locale::all();

    return view('dashboard.locales.create', compact('locales'));
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('locales'),
      ],

      'value' => [
        'required',
        Rule::unique('locales'),
      ]
    ];

    $validationMessages = [
      "title.unique" => "Язык с таким заголовком уже существует!",
      "value.unique" => "Язык с таким значением уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $locale = new Locale();
    $locale->title = $request->title;
    $locale->value = $request->value;
    $locale->default = false;
    $locale->default_for_dashboard = false;
    $locale->save();

    // Create new translations for each item of every Translateable Models
    foreach (Locale::$translateableModels as $model) {
      $model::createNewTranslation($locale->value, $request->inherit_from_locale);
    }

    return redirect()->route('locales.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Locale::find($id);

    return view('dashboard.locales.edit', compact('item'));
  }

  public function update(Request $request)
  {
    $locale = Locale::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('locales')->ignore($locale->id),
      ],

      'value' => [
        'required',
        Rule::unique('locales')->ignore($locale->id),
      ]
    ];

    $validationMessages = [
      "title.unique" => "Язык с таким заголовком уже существует!",
      "value.unique" => "Язык с таким значением уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $oldLocaleValue = $locale->value;
    $valueChanged = $oldLocaleValue === $request->value ? false : true;

    $locale->title = $request->title;
    $locale->value = $request->value;
    $locale->save();

    if($valueChanged) {
      // rename json translations file
      Locale::renameJsonFile($oldLocaleValue, $locale->value);

      // Update translation values of each item of every Translateable Models
      foreach (Locale::$translateableModels as $model) {
        $model::updateTranslationsLocale($oldLocaleValue, $locale->value);
      }
    }

    return redirect()->back();
  }

  public function setAsDefault(Request $request)
  {
    $locales = Locale::all();

    $column = $request->for == 'dashboard' ? 'default_for_dashboard' : 'default';

    foreach ($locales as $item) {
      $item->{$column} = $item->id == $request->id ? true : false;
      $item->save();
    }

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
      $locale = Locale::find($id);

      if($locale->default || $locale->default_for_dashboard) {
        return redirect()->back()->withErrors('Язык используется как основной язык сайта или админки. Пожалуйста, замените основные языки и попробуйте заново!');
      }

      if(Locale::all()->count() <= 1) {
        return redirect()->back()->withErrors('Как минимум 1 язык должен существовать!');
      }

      $locale->delete();
    }

    return redirect()->route('locales.dashboard.index');
  }
}
