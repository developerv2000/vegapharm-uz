@props(['products'])

<ul class="filter__search-list" id="filter-search-list">
  @foreach($products as $product)
    <li class="filter__search-item">
      <a class="filter__search-link" href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
    </li>
  @endforeach

  @if(!count($products))
    <li class="filter__search-link">{{ __('Результатов не найдено') }}!</li>
  @endif
  </select>
