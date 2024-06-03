<?php

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ruTitle = ['Умеренность', 'Развитие', 'Самоконтроль', 'Чистота', 'Бережность', 'Спокойствие', 'Гармония'];
    $ruDesc = 'Это залог эффективной и успешной деятельности, разумная согласованность планов и возможностей, умение в любых ситуациях сохранять равновесие, взвешенные решения и избегание крайностей в действиях.';

    $enTitle = ['Moderation', 'Development', 'Self control', 'Purity', 'Care', 'Calmness', 'Harmony'];
    $enDesc = 'This is the key to effective and successful activity, reasonable coordination of plans and opportunities, the ability to maintain balance in any situation, balanced decisions and avoidance of extremes in actions..';

    for ($i = 0; $i < count($ruTitle); $i++) {
      $s = new Star();
      $s->save();

      $s->translations()->where('locale', 'ru')->first()->update([
        'title' => $ruTitle[$i],
        'description' => $ruDesc
      ]);

      $s->translations()->where('locale', 'en')->first()->update([
        'title' => $enTitle[$i],
        'description' => $enDesc
      ]);
    }
  }
}
