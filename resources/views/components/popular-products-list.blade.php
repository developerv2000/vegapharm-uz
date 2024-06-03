@props(['products'])

<ul class="popular-products-list">
  <li class="popular-products-list__item">{{ __('Популярные препараты') }}:</li>
  @foreach ($products as $product)
    <li class="popular-products-list__item">
      <a class="popular-products-list__link" href="{{ route('products.show', $product->slug) }}">{{ $product->translate('title') }}</a>
    </li>
  @endforeach
</ul>
