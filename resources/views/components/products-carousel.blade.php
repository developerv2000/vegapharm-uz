@props(['products'])

<div class="products-carousel-container">
  <div class="products-carousel owl-carousel">
    @foreach ($products as $product)
      <x-products-card :product="$product" />
    @endforeach
  </div>
</div>
