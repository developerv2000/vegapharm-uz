<?php

namespace App\Models;

use App\Support\Traits\Translateable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $tag = 'products';

    use HasFactory;
    use Translateable;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function booted()
    {
        // Create translations for each locale
        static::created(function ($item) {
            self::createTranslations($item);
        });

        // Also delete model relations
        static::deleting(function ($item) {
            $item->categories()->detach();

            $item->translations()->each(function ($translation) {
                $translation->delete();
            });
        });
    }
}
