<header class="header">
    <div class="header__inner main-container">
        <a class="logo header__logo" href="{{ route('home') }}">
            <img class="logo__image" src="{{ asset('img/main/logo.png') }}" alt="Vegapharm logo">
        </a>

        <div class="header__actions">

            <ul class="header__contacts">
                <li>
                    <a class="header__contacts-link">
                        {{ __('Телефон') }}: <br>
                        {{ App\Models\Option::getByKey('phone')->translate('value') }}
                    </a>
                </li>

                <li>
                    <a class="header__contacts-link" href="mailto:{{ App\Models\Option::getByKey('email')->translate('value') }}">
                        {{ __('Почта') }}: <br>
                        {{ App\Models\Option::getByKey('email')->translate('value') }}
                    </a>
                </li>
            </ul>

            <div class="dropdown locale-dropdown">
                <button class="dropdown__btn">{{ app()->getLocale() }}</button>

                @if ($locales->count() > 1)
                    <ul class="dropdown__list">
                        @foreach ($locales as $locale)
                            <li class="dropdown__item">
                                @if ($locale->value != app()->getLocale())
                                    @if ($locale->value == App\Models\Locale::getDefaultValue())
                                        <a class="dropdown__link" href="/{{ $validatedRequestPath }}">{{ $locale->value }}</a>
                                    @else
                                        <a class="dropdown__link" href="/{{ $locale->value . '/' . $validatedRequestPath }}">{{ $locale->value }}</a>
                                    @endif
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <ul class="header__socials">
                <li>
                    <a class="header__socials-link" href="{{ App\Models\Option::getByKey('facebook-link')->translate('value') }}" target="_blank">
                        <svg>
                            <use href="#facebook-svg"></use>
                        </svg>
                    </a>
                </li>

                <li>
                    <a class="header__socials-link" href="{{ App\Models\Option::getByKey('instagram-link')->translate('value') }}" target="_blank">
                        <svg>
                            <use href="#instagram-svg"></use>
                        </svg>
                    </a>
                </li>

                <li>
                    <a class="header__socials-link" href="{{ App\Models\Option::getByKey('facebook-link')->translate('value') }}" target="_blank">
                        <svg>
                            <use href="#youtube-svg"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</header>
