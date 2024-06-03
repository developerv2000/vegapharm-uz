<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ruTitle = ['Аллергология', 'Антибактериальные препараты', 'Антигистаминные препараты', 'Антимикробные препараты', 'Витамины и минералы', 'Гематология', 'Гинекология', 'Глюкокортикостероиды'];
    $uzTitle = ['Allergology', 'Antibacterial drugs', 'Antihistamines', 'Antimicrobials', 'Vitamins and minerals', 'Hematology', 'Gynecology', 'Glucocorticosteroids'];

    for ($i = 0; $i < count($ruTitle); $i++) {
      $c = new Category();
      $c->save();

      $c->translations()->where('locale', 'ru')->first()->update([
        'title' => $ruTitle[$i],
      ]);

      $c->translations()->where('locale', 'uz')->first()->update([
        'title' => $uzTitle[$i],
      ]);
    }
  }
}
