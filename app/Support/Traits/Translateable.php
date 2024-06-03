<?php

namespace App\Support\Traits;

use App\Models\Locale;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

trait Translateable
{
  public function translations()
  {
    return $this->hasMany(static::class . 'Translation');
  }

  public function translation($locale = null)
  {
    if ($locale == null) {
      $locale = App::getLocale();
    }

    return $this->translations()->where('locale', '=', $locale)->first();
  }

  public function translate($column, $locale = null)
  {
    if ($locale == null) {
      $locale = App::getLocale();
    }

    return $this->translations()->where('locale', '=', $locale)->first()->{$column};
  }

  public function translateForDash($column)
  {
    return $this->translations()->where('locale', '=', Locale::getDefaultValueForDash())->first()->{$column};
  }

  /**
   * Create translations for each locale, after Translateable Models item created
   * Called on boot created function of each Translateable Model
   *
   * @param App\Models\Model $item
   * @return void
   */
  public static function createTranslations($item)
  {
    $locales = Locale::all();

    foreach ($locales as $locale) {
      $item->translations()->create(['locale' => $locale->value]);
    }
  }

  /**
   * Create new translations for each item of every Translateable Models
   * Called while storing/updating locales
   *
   * @param string $locale New translations locale to add
   * @param string $inheritFromLocale Translation data inherited for new creating translations
   * @return void
   */
  public static function createNewTranslation($locale, $inheritFromLocale)
  {
    // get translation table columns excluding [id, locale]
    $translationColumns = Schema::getColumnListing(app(self::class . 'Translation')->getTable());
    $translationColumns = array_diff($translationColumns, array('id', 'locale'));

    // create new translations for each item of model
    $items = self::all();

    foreach($items as $item) {
      $inheritItem = $item->translation($inheritFromLocale);

      $newItem = $item->translations()->create(['locale' => $locale]);

      foreach($translationColumns as $column) {
        $newItem->{$column} = $inheritItem->{$column};
      }

      $newItem->save();
    }
  }

  public static function updateTranslationsLocale($oldValue, $newValue)
  {
    $items = self::all();

    foreach($items as $item) {
      $translation = $item->translation($oldValue);
      $translation->locale = $newValue;
      $translation->save();
    }
  }
}
