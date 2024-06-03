<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Category;
use App\Models\Presence;
use App\Models\Star;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function home()
  {
    $stars = Star::all();
    $achievements = Achievement::orderBy('year')->get();

    $categories = Category::join('category_translations', function ($join) {
      $join->on('categories.id', '=', 'category_translations.category_id');
      $join->where('category_translations.locale', '=', app()->getLocale());
    })
      ->select('categories.*', 'category_translations.title')
      ->orderBy('title')
      ->take(8)
      ->get();

    $cities = Presence::where('type', 'city')->get();
    $countries = Presence::where('type', 'country')->get();

    return view('home.index', compact('stars', 'achievements', 'categories', 'cities', 'countries'));
  }

  public function example1()
  {
    $stars = Star::all();
    $achievements = Achievement::orderBy('year')->get();

    $categories = Category::join('category_translations', function ($join) {
      $join->on('categories.id', '=', 'category_translations.category_id');
      $join->where('category_translations.locale', '=', app()->getLocale());
    })
      ->select('categories.*', 'category_translations.title')
      ->orderBy('title')
      ->take(8)
      ->get();

    $cities = Presence::where('type', 'city')->get();
    $countries = Presence::where('type', 'country')->get();

    return view('home.example1', compact('stars', 'achievements', 'categories', 'cities', 'countries'));
  }

  public function example2()
  {
    $stars = Star::all();
    $achievements = Achievement::orderBy('year')->get();

    $categories = Category::join('category_translations', function ($join) {
      $join->on('categories.id', '=', 'category_translations.category_id');
      $join->where('category_translations.locale', '=', app()->getLocale());
    })
      ->select('categories.*', 'category_translations.title')
      ->orderBy('title')
      ->take(8)
      ->get();

    $cities = Presence::where('type', 'city')->get();
    $countries = Presence::where('type', 'country')->get();

    return view('home.example2', compact('stars', 'achievements', 'categories', 'cities', 'countries'));
  }
}
