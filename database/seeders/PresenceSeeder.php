<?php

namespace Database\Seeders;

use App\Models\Presence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresenceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $ruTitle = ['Лондон', 'Москва', 'Афины', 'Алматы', 'Нью Дели', 'Душанбе', 'Россия', 'Казахстан', 'Узбекистан', 'Туркменистан', 'Афганистан', 'Грузия', 'Таджикистан', 'Кыргызстан', 'Азербайджан', 'Монголия', 'Филиппины', 'Камбоджа', 'Мьянма', 'Вьетнам', 'Индия'];
    $type = ['city', 'city', 'city', 'city', 'city', 'city', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country', 'country'];

    for ($i = 0; $i < count($ruTitle); $i++) {
      $p = new Presence();
      $p->type = $type[$i];
      $p->save();

      $p->translations()->where('locale', 'ru')->first()->update([
        'title' => $ruTitle[$i],
        'address' => '“Vegapharm” улица Н.Карабаева 78/1',
        'phone' => '(+992) 93-444-26-44',
        'email' => 'info@vegapharm.tj'
      ]);

      $p->translations()->where('locale', 'uz')->first()->update([
        'title' => $ruTitle[$i],
        'address' => '“Vegapharm” улица Н.Карабаева 78/1',
        'phone' => '(+992) 93-444-26-44',
        'email' => 'info@vegapharm.tj'
      ]);
    }
  }
}
