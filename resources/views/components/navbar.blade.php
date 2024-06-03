<nav class="navbar">
  <ul class="navbar__list">
    @if(Illuminate\Support\Facades\Route::currentRouteName() == 'home')
      <li>
        <a class="navbar__link" href="#about-us">
          {{ __('О Нас') }}
        </a>
      </li>

      <li>
        <a class="navbar__link navbar__link--highlight" href="{{ route('products.index') }}">
          {{ __('Продукты') }}
        </a>
      </li>

      <li>
        <a class="navbar__link" href="#our-presence">
          {{ __('Контакты') }}
        </a>
      </li>

      <li>
        <a class="navbar__link" href="#career">
          {{ __('Карьера') }}
        </a>
      </li>

    @else
      <li>
        <a class="navbar__link" href="{{ route('home') . '#about-us' }}">
          {{ __('О Нас') }}
        </a>
      </li>

      <li>
        <a class="navbar__link navbar__link--highlight" href="{{ route('products.index') }}">
          {{ __('Продукты') }}
        </a>
      </li>

      <li>
        <a class="navbar__link" href="{{ route('home') . '#our-presence' }}">
          {{ __('Контакты') }}
        </a>
      </li>

      <li>
        <a class="navbar__link" href="{{ route('home') . '#career' }}">
          {{ __('Карьера') }}
        </a>
      </li>
    @endif
  </ul>
</nav>
