<footer class="footer">
  <div class="footer__inner main-container">
    <a class="logo footer__logo" href="{{ route('home') }}">
      <img class="logo__image" src="{{ asset('img/main/logo-new-white.png') }}" alt="Vegapharm logo">
    </a>

    <div class="footer__main">
      <x-navbar />

      <div class="footer__contacts">
        <p class="footer__contacts-item footer__contacts-item-copyright">
          © 2009-{{ date('Y') }} Vegapharm.<br>
          {{ __('Все права защищены') }}.
        </p>

        <p class="footer__contacts-item footer__contacts-item-address">
          {{ __('Адрес регионального офиса') }}:<br>
          {{ App\Models\Option::getByKey('regional-office-address')->translate('value') }}
        </p>

        <p class="footer__contacts-item">
          {{ __('Телефон') }}:<br>
          {{ App\Models\Option::getByKey('phone')->translate('value') }}
        </p>

        <a class="footer__contacts-item" href="mailto:{{ App\Models\Option::getByKey('email')->translate('value') }}">
          {{ __('Почта') }}:<br>
          {{ App\Models\Option::getByKey('email')->translate('value') }}
        </a>
      </div>
    </div>

    <button class="scroll-top"><span class="material-icons-outlined">arrow_upward</span></button>
  </div>
</footer>
