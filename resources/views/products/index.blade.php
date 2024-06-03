@extends('layouts.app')
@section('main')

@section('title', __('Продукты'))

{{-- Greeting start --}}
<section class="greeting products-greeting">
  <div class="greeting__inner main-container">
    <div class="greeting__image-container">
      @foreach ($greetingProducts as $product)
        <img class="greeting__image greeting__image--changeable @if($loop->first)visible @endif" src="{{ asset('img/products/' . $product->translate('image')) }}"
          alt="{{ $product->translate('title') }}">
      @endforeach
    </div>

    <img class="greeting__absolute-pill" src="{{ asset('img/main/pill-2.png') }}" alt="pill">

    <div class="greeting__body">
      <div class="greeting__text">
        <h2 class="greeting__subtitle">{{ __('Вся наша') }}</h2>
        <h1 class="greeting__title">{{ __('Продукция') }}</h1>
        <a class="greeting__link button button--main button_with_red_icon" href="{{ route('home') }}"> {{ __('Вернуться на главную') }}
          <span class="material-icons-outlined">arrow_forward</span>
        </a>
      </div>

      <x-navbar />
    </div>

    <div class="only-mobile mobile-greeting">
      <img src="{{ asset('img/main/greeting-bg.png') }}" alt="shape" class="mobile-greeting__bg">

      <div class="mobile-greeting__image-container">
        @foreach ($greetingProducts as $product)
          <img class="mobile-greeting__image greeting__image--changeable @if($loop->first)visible @endif" src="{{ asset('img/products/' . $product->translate('image')) }}"
            alt="{{ $product->translate('title') }}">
        @endforeach
      </div>
    </div>
  </div>
</section> {{-- Greeting end --}}

{{-- Our Products start --}}
<section class="our-products">
  <div class="our-products__inner main-container">
    <div class="our-products__text-container">
      <h1 class="our-products__title main-title">{{ __('Наша продукция') }}</h1>
      <div class="our-products__text">{!! App\Models\Option::getByKey('our-products')->translate('value') !!}</div>
    </div>

    <div class="prescription-filter">
      <div class="prescription-filter__item">
        <input class="prescription-filter__input" type="checkbox" name="prescription" value="0" id="prescription-otc" @checked($request->prescription != null &&
        $request->prescription == '0')>
        <label class="prescription-filter__label prescription-filter__label--otc" for="prescription-otc">
          <span class="prescription-filter__label-icon">{{ __('OTC') }}</span>
          <span class="prescription-filter__label-text">{{ __('Лекарства отпускаемые без рецепта') }}</span>
        </label>
      </div>

      <div class="prescription-filter__item">
        <input class="prescription-filter__input" type="checkbox" name="prescription" value="1" id="prescription-rx" @checked($request->prescription != null &&
        $request->prescription == '1')>
        <label class="prescription-filter__label prescription-filter__label--rx" for="prescription-rx">
          <span class="prescription-filter__label-icon">{{ __('RX') }}</span>
          <span class="prescription-filter__label-text">{{ __('Лекарства отпускаемые по рецепту') }}</span>
        </label>
      </div>
    </div>
  </div>
</section> {{-- Our Products end --}}

{{-- Products section start --}}
<section class="products-section" id="products-section">
  <div class="products-section__inner main-container">
    <div class="filter" id="filter" data-products-ajax-get-url="{{ route('products.ajax-get') }}" data-products-search-url="{{ route('products.search') }}">
      <x-categories-filter />
      <x-filter-search />
    </div> {{-- Filter end --}}

    {{-- Products List start --}}
    <div class="products-list-container">
      <div class="products-list__title-container title-container">
        <h1 class="main-title products-list__title">{{ __('Все препараты') }}</h1>

        <ul class="breadcrumbs">
          <li class="breadcrumbs__item">
            <a class="breadcrumbs__link" href="{{ route('home') }}">{{ __('Главная') }}</a>
          </li>

          <li class="breadcrumbs__item">
            <a class="breadcrumbs__link" href="{{ route('products.index') }}">{{ __('Продукты') }}</a>
          </li>
        </ul>
      </div>

      <div class="products-list-wrapper" id="products-list-wrapper">
        <x-products-list :products="$products" />
      </div>
    </div> {{-- Products List end --}}

  </div> {{-- Products section inner end --}}
</section> {{-- Products section end --}}

{{-- Popular products start --}}
<section class="popular-products">
  <div class="popular-products__inner main-container">
    <h1 class="popular-products__title main-title">{{ __('Популярные препараты') }}</h1>
    <x-products-carousel :products="$popularProducts" />
  </div>

  <div class="popular-products__foot"></div>
</section> {{-- Popular products end --}}

@endsection
