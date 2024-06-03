@props(['product'])

<a class="product-card product-card--{{ $product->prescription ? 'rx' : 'otc' }}" href="{{ route('products.show', $product->slug) }}">
  <img class="product-card__image" src="{{ asset('img/products/thumbs/' . $product->image) }}" alt="{{ $product->title }}">
  <h3 class="product-card__title">{{ $product->title }}</h3>
  <span class="product-card__prescription">{{ $product->prescription ? 'RX' : 'OTC' }}</span>
  <div class="product-card__description">{{ App\Support\Helper::cleanText($product->description) }}</div>
  <span class="material-icons-outlined product-card__icon">arrow_forward</span>
</a>
