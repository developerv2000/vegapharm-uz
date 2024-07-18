@extends('layouts.app')
@section('main')

@section('title', $product->translate('title'))

@section('meta-tags')
@php $shareText = App\Support\Helper::generateShareText($product->translate('description')); @endphp

<meta name="description" content="{{ $shareText }}">
<meta property="og:description" content="{{ $shareText }}">
<meta property="og:title" content="{{ $product->translate('title') }}" />
<meta property="og:image" content="{{ asset('img/products/' . $product->translate('image')) }}">
<meta property="og:image:alt" content="{{ $product->translate('title') }}">
@endsection

{{-- Greeting start --}}
<section class="greeting products-greeting">
  <div class="greeting__inner main-container">
    <div class="greeting__image-container">
      <img class="greeting__image" src="{{ asset('img/products/' . $product->translate('image')) }}" alt="{{ $product->translate('title') }}">
    </div>

    <img class="greeting__absolute-pill" src="{{ asset('img/main/pill-2.png') }}" alt="pill">

    <div class="greeting__body">
      <div class="greeting__text">
        <h2 class="greeting__subtitle">{{ $product->categories()->first()->translate('title') }}</h2>
        <h1 class="greeting__title">{{ $product->translate('title') }}</h1>
        <a class="greeting__link button button--main button_with_red_icon" href="{{ route('products.index') }}"> {{ __('Все препараты') }}
          <span class="material-icons-outlined">arrow_forward</span>
        </a>
      </div>

      <x-navbar />
    </div>

    <div class="only-mobile mobile-greeting">
      <img src="{{ asset('img/main/greeting-bg.png') }}" alt="shape" class="mobile-greeting__bg">

      <div class="mobile-greeting__image-container">
        <img class="mobile-greeting__image" src="{{ asset('img/products/'  . $product->translate('image')) }}" alt="{{ $product->translate('title') }}">
      </div>
    </div>
  </div>
</section> {{-- Greeting end --}}

{{-- Products Filter start --}}
<section class="products-show-filter-section">
  <div class="products-show-filter-section__inner main-container">
    <div class="products-show-filter filter" id="filter" data-products-ajax-get-url="{{ route('products.ajax-get') }}" data-products-search-url="{{ route('products.search') }}">
      <x-filter-search />
      <x-popular-products-list />
    </div>
  </div>
</section> {{-- Products Filter end --}}

{{-- About Product start --}}
<section class="about-product">
  <div class="about-product__inner main-container">
    <div class="about-product__title-container title-container">
      <h1 class="main-title about-product__title">
        @foreach ($product->categories as $cat)
          {{ $cat->translate('title') }}
          @if(!$loop->last)
            |
          @endif
        @endforeach
      </h1>

      <ul class="breadcrumbs">
        <li class="breadcrumbs__item">
          <a class="breadcrumbs__link" href="{{ route('home') }}">{{ __('Главная') }}</a>
        </li>

        <li class="breadcrumbs__item">
          <a class="breadcrumbs__link" href="{{ route('products.index') }}">{{ __('Продукты') }}</a>
        </li>

        <li class="breadcrumbs__item">
          <a class="breadcrumbs__link" href="{{ route('products.show', $product->slug) }}">{{ $product->translate('title') }}</a>
        </li>
      </ul>
    </div>

    <div class="about-product__main">
      <div class="product-card product-card--horizontal product-card--{{ $product->prescription ? 'rx' : 'otc' }}">
        <div class="product-card__image-container">
          <img class="product-card__image" src="{{ asset('img/products/' . $product->translate('image')) }}" alt="{{ $product->translate('title') }}">
        </div>

        <div class="product-card__text-conent">
          <h3 class="product-card__title">{{ $product->translate('title') }}</h3>
          <span class="product-card__prescription">{{ $product->prescription ? 'RX' : 'OTC' }}</span>
          <div class="product-card__text">{!! $product->translate('description') !!}</div>

          <div class="accordion-buttons-container product-accordion-buttons-container">
            <button class="accordion-button product-accordion-button" data-content-id="compositionContent">
              <span class="material-icons-outlined">east</span> {{ __('Состав') }}
            </button>

            <button class="accordion-button product-accordion-button" data-content-id="indicationContent">
              <span class="material-icons-outlined">east</span> {{ __('Показания к применению') }}
            </button>

            <button class="accordion-button product-accordion-button" data-content-id="useContent">
              <span class="material-icons-outlined">east</span> {{ __('Способ применения') }}
            </button>
          </div>

          <a class="product-instruction-link button button--main button_with_red_icon" href="/instructions/{{ $product->translate('instruction') }}" target="_blank">
            {{ __('Скачать инструкцию') }}
            <span class="material-icons-outlined">arrow_forward</span>
          </a>
        </div>
      </div>

      <div class="accordion-content product-accordion-content">
        <div class="accordion-content__item product-accordion-content__item" data-id="compositionContent">
          {!! $product->translate('composition') !!}
        </div>

        <div class="accordion-content__item product-accordion-content__item" data-id="indicationContent">
          {!! $product->translate('indication') !!}
        </div>

        <div class="accordion-content__item product-accordion-content__item" data-id="useContent">
          {!! $product->translate('use') !!}
        </div>
      </div>
    </div>
  </div>
</section> {{-- About Product end --}}

{{-- Similar Products start --}}
@if(count($similarProducts))
  <section class="similar-products" data-nosnippet>
    <div class="similar-products__inner main-container">
      <h1 class="similar-products__title main-title">{{ __('Похожие препараты') }}</h1>
      <x-products-carousel :products="$similarProducts" />
    </div>
  </section>
@endif {{-- Similar Products end --}}

{{-- Popular products start --}}
<section class="popular-products products-show-popular-products @if(count($similarProducts)) popular-products--blue @endif" data-nosnippet>
  <div class="popular-products__inner main-container">
    <h1 class="popular-products__title main-title">{{ __('Популярные препараты') }}</h1>
    <x-products-carousel :products="$popularProducts" />
  </div>
</section> {{-- Popular products end --}}

@endsection
