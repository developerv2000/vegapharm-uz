<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Locale;
use App\Models\Product;
use App\Support\Helper;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    View::composer(['layouts.header'], function ($view) {
      // Generate validated request path for locale dropdown links
      // return empty string for home page
      if(Route::currentRouteName() == 'home') {
        $requestPath = '';
      }
      else {
        $requestPath = request()->path();
        // remove locale segment from request path if it`s not default locale
        if (app()->getLocale() != Locale::getDefaultValue()) {
          $localeSegmentLength = strlen(request()->segment(1)) + 1;
          $requestPath = substr($requestPath, $localeSegmentLength);
        }
      }

      $view->with('locales', Locale::all())
        ->with('validatedRequestPath', $requestPath);
    });

    View::composer(['components.categories-filter'], function ($view) {
      $view->with('categories', Category::join('category_translations', function ($join) {
        $join->on('categories.id', '=', 'category_translations.category_id');
        $join->where('category_translations.locale', '=', app()->getLocale());
      })
        ->select('categories.*', 'category_translations.title')
        ->orderBy('title')
        ->get());
    });

    View::composer(['components.filter-search'], function ($view) {
      $view->with('products', Product::join('product_translations', function ($join) {
        $join->on('products.id', '=', 'product_translations.product_id');
        $join->where('product_translations.locale', '=', app()->getLocale());
      })
        ->select('products.*', 'product_translations.title')
        ->orderBy('title')
        ->get());
    });

    View::composer(['components.popular-products-list'], function ($view) {
      $view->with('products', Product::where('popular', true)->inRandomOrder()->take(6)->get());
    });

    View::composer(['dashboard.*'], function ($view) {
      $view->with('route', Route::currentRouteName())
        ->with('modelTag', Helper::getModelTag());
    });
  }
}
