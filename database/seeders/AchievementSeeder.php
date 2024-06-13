<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ruTitle = ['Бренд года', 'Бренд года', 'Народная марка', 'Золотая статуэтка Пардифен', 'Бренд года'];
    $enTitle = ['Brand of the Year', 'Brand of the Year', 'People`s stamp', 'Golden figurine Pardifen', 'Brand of the Year'];
    $image = ['1.png', '2.png', '3.png', '4.png', '5.png'];

    for ($i = 0; $i < count($ruTitle); $i++) {
      $a = new Achievement();
      $a->image = $image[$i];
      $a->save();

      $a->translations()->where('locale', 'ru')->first()->update([
        'title' => $ruTitle[$i],
      ]);

      $a->translations()->where('locale', 'uz')->first()->update([
        'title' => $enTitle[$i],
      ]);
    }
  }
}
