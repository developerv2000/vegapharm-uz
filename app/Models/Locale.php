<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
  use HasFactory;

  public static $tag = 'locales';
  public static $translateableModels = [Achievement::class, Category::class, Option::class, Presence::class, Product::class, Star::class];

  public static function getDefaultValue()
  {
    return self::where('default', true)->first()->value;
  }

  public static function getDefaultValueForDash()
  {
    return self::where('default_for_dashboard', true)->first()->value;
  }

  /**
   * Rename json static translations file
   * Called while updating locale value
   *
   * @param string $oldValue
   * @param string $newValue
   * @return void
   */
  public static function renameJsonFile($oldValue, $newValue)
  {
    $oldJsonFile = base_path('lang/' . $oldValue . '.json');
    $newJsonFile = base_path('lang/' . $newValue . '.json');
    rename($oldJsonFile, $newJsonFile);
  }

  protected static function booted()
  {
    // Create new json static text translations file
    static::created(function ($locale) {
      $defaultJsonFile = base_path('lang/default.json');
      $defaultJsonContent = file_get_contents($defaultJsonFile);

      $newJsonFile = base_path('lang/' . $locale->value . '.json');
      file_put_contents($newJsonFile, $defaultJsonContent);
    });

    static::deleting(function ($locale) {
      // Delete translation from all models
      foreach (self::$translateableModels as $model) {
        $model::get()->each(function ($item) use ($locale) {
          $item->translations()->where('locale', $locale->value)->delete();
        });
      }

      // Delete json translations file
      if ($locale->value != 'ru' && $locale->value != 'default') {
        $file = base_path('lang/' . $locale->value . '.json');
        if (file_exists($file)) {
          unlink($file);
        }
      }
    });
  }
}
