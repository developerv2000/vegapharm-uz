@props(['categories'])

<div class="filter__categories">
  <label for="categories-select">{{ __('Категории') }}</label>
  <div class="categories-select-container">
    <select class="categories-select" id="categories-select">
      <option value="all">{{ __('Все препараты') }}</option>
      @foreach($categories as $category)
        <option value="{{ $category->id }}" @selected(request()->category_id == $category->id)>{{ $category->title }}</option>
      @endforeach
    </select>

    <div class="categories-select__icon">
      <svg>
        <use href="#filter-svg"></use>
      </svg>
    </div>
  </div>
</div>
