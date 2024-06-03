<?php

namespace App\Models;

use App\Support\Traits\Translateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
  public $timestamps = false;
  public static $tag = 'options';

  use HasFactory;
  use Translateable;

  public static function getByKey($key)
  {
    return self::where('key', $key)->first();
  }

  protected static function booted()
  {
    // Create translations for each locale
    static::created(function ($item) {
      self::createTranslations($item);
    });
  }
}
