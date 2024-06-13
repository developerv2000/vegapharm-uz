@extends('layouts.app')
@section('main')
    {{-- Greeting start --}}
    <section class="greeting home-greeting">
        <div class="greeting__inner main-container">
            <div class="greeting__image-container">
                <img class="greeting__image" src="{{ asset('img/main/doctor.png') }}" alt="doctor">
            </div>

            <img class="greeting__absolute-pill" src="{{ asset('img/main/pill-2.png') }}" alt="pill">

            <div class="greeting__body">
                <div class="greeting__text">
                    <h2 class="greeting__subtitle"><span class="only-laptop">Vegapharm — </span>{{ __('Путеводная звезда') }}</h2>
                    <h1 class="greeting__title">{{ __('здоровья') }}</h1>
                    <a class="greeting__link button button--main button_with_red_icon" href="{{ route('products.index') }}"> {{ __('Все препараты') }}
                        <span class="material-icons-outlined">arrow_forward</span>
                    </a>
                </div>

                <x-navbar />
            </div>

            <div class="only-mobile mobile-greeting">
                <img src="{{ asset('img/main/greeting-bg.png') }}" alt="shape" class="mobile-greeting__bg">

                <div class="mobile-greeting__image-container">
                    <img class="greeting__image" src="{{ asset('img/main/doctor.png') }}" alt="doctor">
                </div>
            </div>
        </div>
    </section> {{-- Greeting end --}}


    {{-- Stars start --}}
    <section class="stars-section">
        <div class="stars-section__inner main-container">
            <h1 class="stars-section__title main-title">{{ __('7 звезд Vegapharm') }}</h1>
            <div class="stars-section__text">{!! App\Models\Option::getByKey('vega-7-stars')->translate('value') !!}</div>

            <div class="stars-carousel-container owl-carousel-container">
                <div class="stars-carousel owl-carousel" id="stars-carousel">
                    @foreach ($stars as $star)
                        <div class="stars-carousel__item">
                            <div class="stars-carousel__item-header">
                                <span class="stars-carousel__item-icon">
                                    <svg>
                                        <use href="#star-svg"></use>
                                    </svg>
                                </span>

                                {{ $star->translate('title') }}
                            </div>

                            <p class="stars-carousel__item-text">{{ $star->translate('description') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> {{-- Stars end --}}


    {{-- About us start --}}
    <section class="about-us" id="about-us" style="background-image: url({{ asset('img/home/about-bg.png') }})">
        <div class="about-us__inner main-container">
            <h1 class="about-us__title main-title">{{ __('О нас') }}</h1>
            <div class="about-us__text">{!! App\Models\Option::getByKey('about-us')->translate('value') !!}</div>
        </div>
    </section> {{-- About us end --}}


    {{-- Corporate culture start --}}
    <section class="corporate-culture">
        <div class="corporate-culture__inner main-container">
            {{-- Laptop corporate culture start --}}
            <ul class="corporate-culture__list only-laptop">
                <li class="corporate-culture__card">
                    <span class="corporate-culture__card-icon">
                        <svg>
                            <use href="#mission-svg"></use>
                        </svg>
                    </span>

                    <div class="corporate-culture__card-body">
                        <h2 class="corporate-culture__card-title">{{ __('Миссия') }}</h2>
                        <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('mission')->translate('value') }}</p>
                    </div>
                </li>

                <li class="corporate-culture__card">
                    <span class="corporate-culture__card-icon">
                        <svg>
                            <use href="#vision-svg"></use>
                        </svg>
                    </span>

                    <div class="corporate-culture__card-body">
                        <h2 class="corporate-culture__card-title">{{ __('Видение') }}</h2>
                        <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('vision')->translate('value') }}</p>
                    </div>
                </li>

                <li class="corporate-culture__card">
                    <span class="corporate-culture__card-icon">
                        <svg>
                            <use href="#strategy-svg"></use>
                        </svg>
                    </span>

                    <div class="corporate-culture__card-body">
                        <h2 class="corporate-culture__card-title">{{ __('Стратегия') }}</h2>
                        <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('strategy')->translate('value') }}</p>
                    </div>
                </li>
            </ul> {{-- Laptop corporate culture end --}}

            {{-- Mobile corporate culture start --}}
            <div class="corporate-culture-carousel-container owl-carousel-container only-mobile">
                <div class="corporate-culture-carousel owl-carousel">
                    <li class="corporate-culture__card">
                        <span class="corporate-culture__card-icon">
                            <svg>
                                <use href="#mission-svg"></use>
                            </svg>
                        </span>

                        <div class="corporate-culture__card-body">
                            <h2 class="corporate-culture__card-title">{{ __('Миссия') }}</h2>
                            <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('mission')->translate('value') }}</p>
                        </div>
                    </li>

                    <li class="corporate-culture__card">
                        <span class="corporate-culture__card-icon">
                            <svg>
                                <use href="#vision-svg"></use>
                            </svg>
                        </span>

                        <div class="corporate-culture__card-body">
                            <h2 class="corporate-culture__card-title">{{ __('Видение') }}</h2>
                            <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('vision')->translate('value') }}</p>
                        </div>
                    </li>

                    <li class="corporate-culture__card">
                        <span class="corporate-culture__card-icon">
                            <svg>
                                <use href="#strategy-svg"></use>
                            </svg>
                        </span>

                        <div class="corporate-culture__card-body">
                            <h2 class="corporate-culture__card-title">{{ __('Стратегия') }}</h2>
                            <p class="corporate-culture__card-text">{{ App\Models\Option::getByKey('strategy')->translate('value') }}</p>
                        </div>
                    </li>
                </div>
            </div> {{-- Mobile corporate culture end --}}
        </div>
    </section> {{-- Corporate culture end --}}


    {{-- Achievements start --}}
    <section class="achievements-section">
        <div class="achievements-section__inner main-container">
            <h1 class="achievements-section__title main-title">{{ __('Наши партнёры') }}</h1>
            {{-- <div class="achievements-section__text">{!! App\Models\Option::getByKey('achievements')->translate('value') !!}</div> --}}

            <div class="achievements-carousel-container owl-carousel-container">
                <div class="achievements-carousel owl-carousel" id="achievements-carousel">
                    @foreach ($achievements as $achievement)
                        <div class="achievements-carousel__item">
                            <div class="achievements-carousel__item-header">
                                <span class="achievements-carousel__item-icon">
                                    <svg>
                                        <use href="#achievement-svg"></use>
                                    </svg>
                                </span>

                                <div class="achievements-carousel__item-header-text">
                                    {{ $achievement->year }}<br>
                                    {{ $achievement->translate('title') }}
                                </div>
                            </div>

                            <img class="achievements-carousel__item-image" src="{{ asset('img/achievements/' . $achievement->image) }}" alt="{{ $achievement->translate('title') }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section> {{-- Achievements end --}}


    {{-- Activity start --}}
    <section class="activity-section" style="background-image: url({{ asset('img/home/activity-bg.png') }})">
        <div class="activity-section__inner main-container">
            <h1 class="activity-section__title main-title">{{ __('Общественная деятельность') }}</h1>
            <div class="activity-section__text">{!! App\Models\Option::getByKey('social-activity')->translate('value') !!}</div>
        </div>
    </section> {{-- Activity end --}}


    {{-- Home Global start --}}
    <section class="home__global">
        <div class="home__global__inner main-container">
            {{-- Home Products start --}}
            <div class="home-products">
                <h1 class="home-products__title main-title">{{ __('Наша продукция') }}</h1>
                <div class="home-products__text">{!! App\Models\Option::getByKey('our-products')->translate('value') !!}</div>

                <ul class="home-products__categories-list">
                    @foreach ($categories as $category)
                        <li class="home-products__categories-item">
                            <a class="home-products__categories-link" href="{{ route('products.index') . '?category_id=' . $category->id . '#products-section' }}">
                                <span class="material-icons-outlined">east</span>
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="home-products__categories-more-container">
                    <a class="home-products__categories-more button button--main button_with_red_icon" href="{{ route('products.index') }}">
                        {{ __('Все препараты') }}
                        <span class="material-icons-outlined">arrow_forward</span>
                    </a>
                </div>
            </div> {{-- Home Products end --}}

            {{-- Our presence start --}}
            <div class="our-presence" id="our-presence">
                <h1 class="our-presence__title main-title">{{ __('Наше присутствие') }}</h1>
                <div class="our-presence__text">{!! App\Models\Option::getByKey('our-presence')->translate('value') !!}</div>
            </div> {{-- Our presence end --}}

            {{-- Presence Globe start --}}
            <div class="presence-globe">
                <div class="accordion-buttons-container presence-globe__panel theme-styled-block">
                    <div class="presence-globe__cities">
                        <h3 class="presence-globe__title">{{ __('Основные региональные офисы') }}</h3>
                        <ul class="presence-globe__list">
                            @foreach ($cities as $city)
                                <li class="presence-globe__item">
                                    <button class="accordion-button presence-accordion-button
                  @if ($loop->first) accordion-button--active @endif"
                                        data-content-id="city{{ $city->id }}">{{ $city->translate('title') }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="presence-globe__countries">
                        <h3 class="presence-globe__title">{{ __('Страны обслуживания') }}</h3>
                        <ul class="presence-globe__list">
                            @foreach ($countries as $country)
                                <li class="presence-globe__item">
                                    <button class="accordion-button presence-accordion-button" data-content-id="country{{ $country->id }}">{{ $country->translate('title') }}</button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <img class="presence-globe__image" src="{{ asset('img/home/globe.png') }}" alt="globe">
                </div>

                <div class="accordion-content presence-accordion-content">
                    @foreach ($cities as $city)
                        <div class="accordion-content__item presence-accordion-content__item @if ($loop->first) accordion-content__item--active @endif" data-id="city{{ $city->id }}">
                            <p class="presence-accordion-content__address">{{ __('Адрес регионального офиса') }}:<br>{{ $city->translate('address') }}</p>
                            <a class="presence-accordion-content__phone" href="tel:{{ $city->translate('phone') }}">{{ __('Телефон') }}:<br>{{ $city->translate('phone') }}</a>
                            <a class="presence-accordion-content__email" href="mailto:{{ $city->translate('email') }}">{{ __('Почта') }}:<br>{{ $city->translate('email') }}</a>
                        </div>
                    @endforeach

                    @foreach ($countries as $country)
                        <div class="accordion-content__item presence-accordion-content__item" data-id="country{{ $country->id }}">
                            <p class="presence-accordion-content__address">{{ __('Адрес регионального офиса') }}:<br>{{ $country->translate('address') }}</p>
                            <a class="presence-accordion-content__phone" href="tel:{{ $country->translate('phone') }}">{{ __('Телефон') }}:<br>{{ $country->translate('phone') }}</a>
                            <a class="presence-accordion-content__email" href="mailto:{{ $country->translate('email') }}">{{ __('Почта') }}:<br>{{ $country->translate('email') }}</a>
                        </div>
                    @endforeach
                </div>
            </div> {{-- Presence Globe end --}}

            <div class="career-feedback-divider">
                <div class="career-feedback-divider__inner">
                    <div class="career-block" id="career">
                        <h1 class="career-block__title main-title">{{ __('Карьера') }}</h1>
                        <div class="career-block__text theme-styled-block">{!! App\Models\Option::getByKey('career')->translate('value') !!}</div>
                    </div>

                    <div class="feedback-block">
                        <h1 class="feedback-block__title main-title">{{ __('Обратная связь') }}</h1>

                        <form class="feedback-form theme-styled-block" action="{{ route('feedback.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <input class="feedback-input" type="text" name="name" placeholder="{{ __('Имя') }}*" required>
                                <input class="feedback-input" type="email" name="email" placeholder="{{ __('Почта') }}*" required>
                            </div>

                            <div class="form-group">
                                <input class="feedback-input" type="text" name="theme" placeholder="{{ __('Тема обращения') }}">
                            </div>

                            <div class="form-group form-group--grow">
                                <textarea class="feedback-textarea" name="body" rows="5" placeholder="{{ __('Ваш текст') }}"></textarea>
                            </div>

                            <button class="feedback-submit button button--main button_with_light_icon">
                                {{ __('Отправить') }} <span class="material-icons-outlined">arrow_forward</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div> {{-- Home Global Inner end --}}
    </section> {{-- Home Global end --}}
@endsection
