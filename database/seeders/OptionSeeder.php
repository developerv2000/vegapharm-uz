<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $opt = new Option();
    $opt->title = '7 звезд Vegapharm';
    $opt->key = 'vega-7-stars';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>В основе крепкого здоровья и комфортного самочувствия лежит 7 добродетелей, 7 постулатов. Все они являются основой и для деятельности Vegapharm.</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>В основе крепкого здоровья и комфортного самочувствия лежит 7 добродетелей, 7 постулатов. Все они являются основой и для деятельности Vegapharm.</p>'
    ]);



    $opt = new Option();
    $opt->title = 'О Нас';
    $opt->key = 'about-us';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>Vegapharm – молодая и быстрорастущая фармацевтическая компания, основанная в 2000 году.</p>
            <p>В наше время открываются новые возможности, которые помогают преодолевать вызовы постоянно меняющегося окружения. Успешная фармацевтическая компания должно базироваться на гибких и на экономически целесообразных, международных бизнес- процессах, чтобы принять новые возможности для изменений.</p>
            <p>Компания Vegapharm – это именно та международная фармацевтическая компания, которая рассматривает любые изменения в окружающем нас мире не как препятствия, а как возможности и перспективы. Vegapharm занимается разработкой и маркетингом фармацевтической продукции.</p>
            <p>Она образована специалистами с большим стажем работы в области разработки, маркетинга и продвижения фармацевтической продукции. Благодаря деятельности нашей фармацевтической компании, врачи имеют возможность широкого выбора лекарственных препаратов и тщательного их подбора для конкретных пациентов. Они получают от наших сотрудников исчерпывающую информацию о новых разработках в области современной медицины.</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>Vegapharm – молодая и быстрорастущая фармацевтическая компания, основанная в 2000 году.</p>
            <p>В наше время открываются новые возможности, которые помогают преодолевать вызовы постоянно меняющегося окружения. Успешная фармацевтическая компания должно базироваться на гибких и на экономически целесообразных, международных бизнес- процессах, чтобы принять новые возможности для изменений.</p>
            <p>Компания Vegapharm – это именно та международная фармацевтическая компания, которая рассматривает любые изменения в окружающем нас мире не как препятствия, а как возможности и перспективы. Vegapharm занимается разработкой и маркетингом фармацевтической продукции.</p>
            <p>Она образована специалистами с большим стажем работы в области разработки, маркетинга и продвижения фармацевтической продукции. Благодаря деятельности нашей фармацевтической компании, врачи имеют возможность широкого выбора лекарственных препаратов и тщательного их подбора для конкретных пациентов. Они получают от наших сотрудников исчерпывающую информацию о новых разработках в области современной медицины.</p>'
    ]);



    $opt = new Option();
    $opt->title = 'Миссия';
    $opt->key = 'mission';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'Способствовать росту качественных и доступных лекарства на рынках стран присутствия, а также предлагать новые методы лечения для разных направлений современной медицины. Мы стремимся улучшать здоровье и жизнь наших соотечественников.'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'Способствовать росту качественных и доступных лекарства на рынках стран присутствия, а также предлагать новые методы лечения для разных направлений современной медицины. Мы стремимся улучшать здоровье и жизнь наших соотечественников.'
    ]);



    $opt = new Option();
    $opt->title = 'Видение';
    $opt->key = 'vision';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'Укрепление позиций Vegapharm как одной из ведущих мировых фармацевтических компаний. Мы реализуем видение будущего, оставаясь независимым предприятием и укрепляя коммерческие связи и партнерские отношения в области развития и рекламы.'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'Укрепление позиций Vegapharm как одной из ведущих мировых фармацевтических компаний. Мы реализуем видение будущего, оставаясь независимым предприятием и укрепляя коммерческие связи и партнерские отношения в области развития и рекламы.'
    ]);



    $opt = new Option();
    $opt->title = 'Стратегия';
    $opt->key = 'strategy';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'Vegapharm постоянно развивается и растет. Мы сосредоточены на всём, что делаем, ставим чёткие цели и концентрируем на них наши усилия, внимание и энергию. Наша компания делает то, о чём говорит, и считает себя ответственными за все наши действия.'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'Vegapharm постоянно развивается и растет. Мы сосредоточены на всём, что делаем, ставим чёткие цели и концентрируем на них наши усилия, внимание и энергию. Наша компания делает то, о чём говорит, и считает себя ответственными за все наши действия.'
    ]);

    

    $opt = new Option();
    $opt->title = 'Общественная деятельность';
    $opt->key = 'social-activity';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>Являясь признанным лидером фармацевтической отрасли, Vegapharm успешно подает пример остальным, благодаря своей активной благотворительной деятельности. Время от времени компания организует благотворительные велопробеги для детей с сахарным диабетом и спонсирует детские представления в кукольном театре. Также ежегодно Vegapharm проводит праздник в поддержку детей с синдромом Дауна.</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>Являясь признанным лидером фармацевтической отрасли, Vegapharm успешно подает пример остальным, благодаря своей активной благотворительной деятельности. Время от времени компания организует благотворительные велопробеги для детей с сахарным диабетом и спонсирует детские представления в кукольном театре. Также ежегодно Vegapharm проводит праздник в поддержку детей с синдромом Дауна.</p>'
    ]);



    $opt = new Option();
    $opt->title = 'Наша продукция';
    $opt->key = 'our-products';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>Мы производим качественные препараты для разной отрасли медицины</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>Мы производим качественные препараты для разной отрасли медицины</p>'
    ]);



    $opt = new Option();
    $opt->title = 'Наше присутствие';
    $opt->key = 'our-presence';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>Основными достижениями компании Vegapharm является постоянно растущее число долгосрочных контрактов с клиентами, которые работают на мировом фармацевтическом рынке и партнеров производителей в Европе и Азии. Это подтверждает соответствие наших услуг существующим современным требованиям клиентов и партнеров. Компания постоянно работает над расширением спектра услуг аутсорсинга. В нашем лице Клиент получает не только исполнителя, но и надежного партнера.</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>Основными достижениями компании Vegapharm является постоянно растущее число долгосрочных контрактов с клиентами, которые работают на мировом фармацевтическом рынке и партнеров производителей в Европе и Азии. Это подтверждает соответствие наших услуг существующим современным требованиям клиентов и партнеров. Компания постоянно работает над расширением спектра услуг аутсорсинга. В нашем лице Клиент получает не только исполнителя, но и надежного партнера.</p>'
    ]);


    $opt = new Option();
    $opt->title = 'Карьера';
    $opt->key = 'career';
    $opt->wysiwyg = true;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '<p>Сотрудники – основной актив компании Vegapharm открывает свои двери всем желающим приобрести международный опыт в сфере фармацевтики. Мы придерживаемся высокой кадровой политики компании, которая направлена на развитие сплоченной команды высококвалифицированных, талантливых и амбициозных профессионалов.</p>
            <p>Эффективные коммуникации внутри компании, вовлеченность каждого сотрудника в достижение поставленных целей, прозрачная система мотивации, профессионального и карьерного роста определяют успешное динамичное развитие компании Vegapharm.</p>'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '<p>Сотрудники – основной актив компании Vegapharm открывает свои двери всем желающим приобрести международный опыт в сфере фармацевтики. Мы придерживаемся высокой кадровой политики компании, которая направлена на развитие сплоченной команды высококвалифицированных, талантливых и амбициозных профессионалов.</p>
            <p>Эффективные коммуникации внутри компании, вовлеченность каждого сотрудника в достижение поставленных целей, прозрачная система мотивации, профессионального и карьерного роста определяют успешное динамичное развитие компании Vegapharm.</p>'
    ]);


    $opt = new Option();
    $opt->title = 'Телефон';
    $opt->key = 'phone';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '+7 701 071 8802'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '+7 701 071 8802'
    ]);


    $opt = new Option();
    $opt->title = 'Почта';
    $opt->key = 'email';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'info@vegapharm.kz'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'info@vegapharm.kz'
    ]);


    $opt = new Option();
    $opt->title = 'Адрес регионального офиса';
    $opt->key = 'regional-office-address';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'ул. Сагадат Нурмагамбетова, д. 200, Алматы, Казахстан'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'ул. Сагадат Нурмагамбетова, д. 200, Алматы, Казахстан'
    ]);


    $opt = new Option();
    $opt->title = 'Инстаграм ссылка';
    $opt->key = 'instagram-link';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'https://www.instagram.com/vegapharm_kazakhstan/'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'https://www.instagram.com/vegapharm_kazakhstan/'
    ]);


    $opt = new Option();
    $opt->title = 'Фейсбук ссылка';
    $opt->key = 'facebook-link';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '#'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '#'
    ]);

    $opt = new Option();
    $opt->title = 'Ютуб ссылка';
    $opt->key = 'youtube-link';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => '#'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => '#'
    ]);

    $opt = new Option();
    $opt->title = 'Мета-тег описание сайта. Реком/длина 50 - 160 символа';
    $opt->key = 'meta-tag-description';
    $opt->wysiwyg = false;
    $opt->save();

    $opt->translations()->where('locale', 'ru')->first()->update([
      'value' => 'Описание сайта для поисковиков'
    ]);

    $opt->translations()->where('locale', 'uz')->first()->update([
      'value' => 'Описание сайта для поисковиков'
    ]);
  }
}
