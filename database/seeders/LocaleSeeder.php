<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $title = ['Русский', 'English'];
    $value = ['ru', 'en'];
    $default = [true, false];
    $defaultForDashboard = [true, false];

    for ($i = 0; $i < count($title); $i++) {
      $locale = new Locale();
      $locale->title = $title[$i];
      $locale->value = $value[$i];
      $locale->default = $default[$i];
      $locale->default_for_dashboard = $defaultForDashboard[$i];
      $locale->saveQuietly();
    }
  }
}
