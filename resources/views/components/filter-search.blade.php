@props(['products'])

<div class="filter__search">
  <input class="filter__search-input" type="text" placeholder="{{ __('Поиск по ключевой информации') }}" id="filter-search-input">
  <div class="filter__search-dropdown" id="filter-search-dropdown">
    <x-filter-search-list :products="$products" />
  </div>

  <span class="material-icons-outlined filter__search-icon">search</span>
</div>
