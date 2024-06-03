<aside class="aside">
  <nav class="aside__nav">
    <ul class="aside__menu">
      <li class="aside__menu-item">
        <p class="aside__menu-title">Основные</p>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $route == 'dashboard.index' || $modelTag == 'products')active @endif" href="{{ route('dashboard.index') }}">
          <span class="material-icons-outlined">inventory</span> Продукты
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'categories') active @endif" href="{{ route('categories.dashboard.index') }}">
          <span class="material-icons-outlined">category</span> Категории
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'achievements') active @endif" href="{{ route('achievements.dashboard.index') }}">
          <span class="material-icons-outlined">emoji_events</span> Достижения
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'presence') active @endif" href="{{ route('presence.dashboard.index') }}">
          <span class="material-icons-outlined">place</span> Наше присутствие
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'stars') active @endif" href="{{ route('stars.dashboard.index') }}">
          <span class="material-icons-outlined">grade</span> Звезды
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'options') active @endif" href="{{ route('options.dashboard.index') }}">
          <span class="material-icons-outlined">notes</span> Тексты
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'translations') active @endif" href="{{ route('translations.dashboard.index') }}">
          <span class="material-icons-outlined">translate</span> Статик текст
        </a>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link @if( $modelTag == 'locales') active @endif" href="{{ route('locales.dashboard.index') }}">
          <span class="material-icons-outlined">flag</span> Языки
        </a>
      </li>

      <li class="aside__menu-item">
        <p class="aside__menu-title">Дополнительно</p>
      </li>

      <li class="aside__menu-item">
        <a class="aside__menu-link" href="{{ route('home') }}" target="_blank">
          <span class="material-icons-outlined">home</span> Перейти на сайт
        </a>
      </li>

      <li class="aside__menu-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="aside__menu-button"><span class="material-icons-outlined">exit_to_app</span> Выйти</button>
        </form>
      </li>
    </ul>
  </nav>
</aside>
