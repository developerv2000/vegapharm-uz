<?php

namespace App\Models;

use App\Support\Traits\Translateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
  public $timestamps = false;
  public static $tag = 'presence';

  use HasFactory;
  use Translateable;

  protected static function booted()
  {
    // Create translations for each locale
    static::created(function ($item) {
      self::createTranslations($item);
    });

    // Also delete model relations
    static::deleting(function ($item) {
      $item->translations()->each(function ($translation) {
        $translation->delete();
      });
    });
  }
}
