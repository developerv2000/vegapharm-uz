@props(['products'])

<ul class="products-list" id="products-list">
  @foreach ($products as $product)
    <li class="products-list__item">
      <x-products-card :product="$product" />
    </li>
  @endforeach

  @if(!count($products))
    <p class="products-list__warning">{{ __('Продукты по вашему запросу не найдены') }}!</p>
  @endif
</ul>

{{ $products->links('layouts.pagination') }}
