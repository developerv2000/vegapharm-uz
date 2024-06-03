<?php

/**
 * Custom Helper class
 *
 * @author Bobur Nuridinov <bobnuridinov@gmail.com>
 */

namespace App\Support;

use App\Models\Achievement;
use App\Models\Category;
use App\Models\Locale;
use App\Models\Option;
use App\Models\Presence;
use App\Models\Product;
use App\Models\Star;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Image;

class Helper
{
  /**
   * Generate unique slug for the given model
   *
   * @param string $string Generates slug from given string
   * @param string $model Model Classname with full namespace
   * @param integer $ignoreId ignore slug of a model with a given id (used while updating model)
   * @return string
   */
  public static function generateUniqueSlug($string, $model, $ignoreId = null)
  {
    $search = [
      'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п',
      'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
      'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П',
      'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
      'ӣ', 'ӯ', 'ҳ', 'қ', 'ҷ', 'ғ', 'Ғ', 'Ӣ', 'Ӯ', 'Ҳ', 'Қ', 'Ҷ',
      ' ', '_'
    ];

    $replace = [
      'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
      'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
      'a', 'b', 'v', 'g', 'd', 'e', 'io', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
      'r', 's', 't', 'u', 'f', 'h', 'ts', 'ch', 'sh', 'shb', 'a', 'i', 'y', 'e', 'yu', 'ya',
      'i', 'u', 'h', 'q', 'j', 'g', 'g', 'i', 'u', 'h', 'q', 'j',
      '-', '-'
    ];

    // manual transilation
    $transilation = str_replace($search, $replace, $string);

    // auto transilation
    $transilation = Str::ascii($transilation);

    // remove unwanted characters
    $transilation = preg_replace('~[^-\w]+~', '', $transilation);

    // remove duplicate divider
    $transilation = preg_replace('~-+~', '-', $transilation);

    // trim
    $transilation = trim($transilation, '-');

    // lowercase
    $slug = strtolower($transilation);

    // escape duplicate slug
    $counter = 1;
    $originalSlug = $slug;

    while ($model::where('slug', $slug)->where('id', '!=', $ignoreId)->first()) {
      $slug = $originalSlug . '-' . $counter;
      $counter++;
    }

    return $slug;
  }

  /**
   * remove tags, decode htmlspecialchars, trim and remove whitespaces
   * cut string if length given
   * and return clean text
   *
   * used while sharing in socials/messangers
   *
   * @param string $string
   * @param integer $length
   * @return string
   */
  public static function cleanText($string, $length = null)
  {
    $cleaned = preg_replace('#<[^>]+>#', ' ', $string); // remove tags
    $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
    $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
    $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
    $cleaned = trim($cleaned); // remove whitespaces

    if ($length) {
      $cleaned = mb_strlen($cleaned) < $length ? $cleaned : mb_substr($cleaned, 0, ($length - 4)) . '...'; // cut length
    }

    return $cleaned;
  }

  /**
   * remove tags, decode htmlspecialchars, trim and remove whitespaces
   * cut string if length given
   * and return clean text
   *
   * used while sharing in socials/messangers
   *
   * @param string $string
   * @return string
   */
  public static function generateShareText($string)
  {
    $cleaned = preg_replace('#<[^>]+>#', ' ', $string); //remove tags
    $cleaned = htmlspecialchars_decode($cleaned); // decode htmlspecialchars
    $cleaned = str_replace('&nbsp;', ' ', $cleaned); // &nbsp to space
    $cleaned = preg_replace('!\s+!', ' ', $cleaned); // many spaces into one
    $cleaned = trim($cleaned); // remove whitespaces
    $cleaned = mb_strlen($cleaned) < 160 ? $cleaned : mb_substr($cleaned, 0, 156) . '...'; //cut length

    return $cleaned;
  }

  /**
   * Return models tag for current route
   * Shared with all dashboard views by AppServiceProvider
   *
   * used only in dashboard
   *
   * @return string
   */
  public static function getModelTag()
  {
    $route = Route::currentRouteName();
    $modelTag = 'undefined';

    if (strpos($route, 'products') !== false || $route == 'dashboard.index') {
      return Product::$tag;
    }

    if (strpos($route, 'categories') !== false) {
      return Category::$tag;
    }

    if (strpos($route, 'options') !== false) {
      return Option::$tag;
    }

    if (strpos($route, 'achievements') !== false) {
      return Achievement::$tag;
    }

    if (strpos($route, 'presence') !== false) {
      return Presence::$tag;
    }

    if (strpos($route, 'stars') !== false) {
      return Star::$tag;
    }

    if (strpos($route, 'locales') !== false) {
      return Locale::$tag;
    }

    if ($route == 'translations.dashboard.index' || $route == 'translations.edit') {
      return 'translations';
    }

    return $modelTag;
  }

  /**
   * Return reversed order type
   *
   * used only in dashboard
   *
   * @param string $orderType
   * @return string
   */
  public static function reverseOrderType($orderType)
  {
    return $orderType == 'asc' ? 'desc' : 'asc';
  }

  /**
   * Fill Eloquent Model Items fields from request by loop. Used while storing & updating Eloquent Model item
   *
   * @param \Http\Request $request
   * @param \Eloquent\Model $model
   * @param array $fields
   * @return void
   */
  public static function fillModelColumns($model, $fields, $request,)
  {
    foreach ($fields as $field) {
      $model[$field] = $request[$field];
    }
  }

  /**
   * Upload models file & update models column. Images can be resized after upload
   *
   * Resizing (Only Images) works only if width or height is given
   * Image will be croped from the center, If both width and height are given (fit)
   * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
   *
   * @param \Http\Request $request
   * @param \Eloquent\Model\ $model
   * @param string $column Requested file input name and Models column name
   * @param string $name Name for newly creating file
   * @param string $path Path to store
   * @param integer $width Width for resize
   * @param integer $height Height for resize
   * @return void
   */
  public static function uploadModelsFile($request, $model, $column, $name, $path, $width = null, $height = null)
  {
    // Any file input maybe nullable on model update
    $file = $request->file($column);
    if ($file) {
      $filename = $name . '.' . $file->getClientOriginalExtension();
      $filename = Helper::renameIfFileAlreadyExists($filename, $path);

      $fullPath = public_path($path);

      $file->move($fullPath, $filename);
      $model[$column] = $filename;

      //resize image
      if ($width || $height) {
        $image = Image::make($fullPath . '/' . $filename);

        // fit
        if ($width && $height) {
          $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
          }, 'center');

          // aspect ratio
        } else {
          $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
          });
        }

        $image->save($fullPath . '/' . $filename);
      }
    }
  }

  /**
   * Make thumb from original and store it in thumbs folder
   * Image will be croped from the center, If both width and height are given (fit)
   * Else if one of the parameters is given (width or height), another will be calculated auto (aspectRatio)
   * Thumbs will be saved in original-path/thumbs folder
   *
   * ---WARNING---
   * To escape errors, thumbs folder must exists in original path
   *
   * @param string $path Path of original image
   * @param string $filename Name of original image
   * @param integer $width Width of thumb in pixels
   * @param integer $height Height of thumb in pixels
   * @return void
   */
  public static function createThumb($path, $filename, $width = 400, $height = null)
  {
    $fullPath = public_path($path);
    $thumb = Image::make($fullPath . '/' . $filename);

    // fit
    if ($width && $height) {
      $thumb->fit($width, $height, function ($constraint) {
        $constraint->upsize();
      }, 'center');

      // aspect ration
    } else {
      $thumb->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
      });
    }

    $thumb->save($fullPath . '/thumbs//' . $filename);
  }

  /**
   * Rename file if file with the given name is already exists on the given folder
   * Renaming type => oldName(i)
   *
   * @param string $filename
   * @param string $path
   * @return string
   */
  public static function renameIfFileAlreadyExists($filename, $path)
  {
    $name = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $fullPath = public_path($path) . '/';

    $counter = 1;
    $originalName = $name;

    while (file_exists($fullPath . $filename)) {
      $name = $originalName . '(' . $counter . ')';
      $filename = $name . '.' . $extension;
      $counter++;
    }

    return $filename;
  }
}
