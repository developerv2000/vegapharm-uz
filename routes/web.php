<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StarController;
use App\Http\Controllers\TranslationController;
use App\Models\Locale;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->prefix('dashboard')->group(function () {
  Route::get('/', [ProductController::class, 'dashboardIndex'])->name('dashboard.index');

  Route::controller(ProductController::class)->prefix('/products')->name('products.')->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(CategoryController::class)->prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(AchievementController::class)->prefix('/achievements')->name('achievements.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(PresenceController::class)->prefix('/presence')->name('presence.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(StarController::class)->prefix('/stars')->name('stars.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(OptionController::class)->prefix('/options')->name('options.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/{id}/translations', 'translations')->name('translations');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/update', 'update')->name('update');
  });

  Route::controller(TranslationController::class)->prefix('/translations')->name('translations.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/view-default', 'viewDefault')->name('view-default');
    Route::get('/{locale}', 'edit')->name('edit');

    Route::post('/update', 'update')->name('update');
    Route::post('/reset', 'reset')->name('reset');
  });

  Route::controller(LocaleController::class)->prefix('/locales')->name('locales.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/set-as-default', 'setAsDefault')->name('set-as-default');
    Route::post('/destroy', 'destroy')->name('destroy');
  });
});


Route::prefix(parseLocale())->group(function () {
  Route::get('/', [MainController::class, 'home'])->name('home');
  Route::get('/example1', [MainController::class, 'example1'])->name('example1');
  Route::get('/example2', [MainController::class, 'example2'])->name('example2');

  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

  Route::post('/products/ajax-get', [ProductController::class, 'ajaxGet'])->name('products.ajax-get');
  Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
  Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
});


function parseLocale()
{
  $locale = request()->segment(1);
  $locales = Locale::pluck('value')->toArray();
  $default = Locale::getDefaultValue();

  if ($locale !== $default && in_array($locale, $locales)) {
    app()->setLocale($locale);

    return $locale;
  }

  else {
    app()->setLocale($default);
  }
}

require __DIR__ . '/auth.php';
