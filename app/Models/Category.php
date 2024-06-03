<?php

namespace App\Models;

use App\Support\Traits\Translateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $timestamps = false;
  public static $tag = 'categories';

  use HasFactory;
  use Translateable;

  public function products()
  {
    return $this->belongsToMany(Product::class);
  }

  protected static function booted()
  {
    // Create translations for each locale
    static::created(function ($item) {
      self::createTranslations($item);
    });

    // Also delete model relations
    static::deleting(function ($item) {
      $item->products()->detach();

      $item->translations()->each(function ($translation) {
        $translation->delete();
      });
    });
  }
}
