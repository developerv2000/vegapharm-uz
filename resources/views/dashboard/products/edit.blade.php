@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">
  <input type="hidden" name="locale" value="{{ $locale }}">

  {{-- Same filds for all languages start --}}
  <div class="form-section">
    @include('dashboard.components.form.same-fields-title')

    <div class="form-group">
      <label class="form-label required">Рецептурность продукта</label>

      <select class="selectize-singular" name="prescription" required>
        <option value="0" @selected(!$item->prescription)>OTC</option>
        <option value="1" @selected($item->prescription)>RX</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Категории</label>

      <select class="selectize-multiple" name="categories[]" multiple="multiple" required>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" @foreach ($item->categories as $itemCat)
          @selected($category->id == $itemCat->id)
          @endforeach
          >{{ $category->title }}
        </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Добавить в популярные продукты?</label>

      <select class="selectize-singular" name="popular" required>
        <option value="0" @selected(!$item->popular)>Нет</option>
        <option value="1" @selected($item->popular)>Да</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Отображать в баннере на странице все продукты?</label>

      <select class="selectize-singular" name="displayOnGreeting" required>
        <option value="0" @selected(!$item->displayOnGreeting)>Нет</option>
        <option value="1" @selected($item->displayOnGreeting)>Да</option>
      </select>
    </div>
  </div> {{-- Same filds for all languages end --}}

  {{-- Fields for specific locale start --}}
  <div class="form-section">
    @include('dashboard.components.form.specific-locale-fields-title')

    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title', $item->translate('title', $locale)) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label">Изображение. Все изображения продуктов должны иметь одинаковую пропорцию!</label>

      <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
      <img class="form-image" data-id="local-image" src="{{ asset('img/products/' . $item->translate('image', $locale)) }}">
    </div>

    <div class="form-group">
      <label class="form-label">Инструкция: <a href="/instructions/{{ $item->translate('instruction') }}" target="_blank">{{ $item->translate('instruction', $locale) }}</a></label>

      <input class="form-input" type="file" name="instruction" accept=".pdf">
    </div>

    <div class="form-group">
      <label class="form-label required">Описание</label>

      <textarea class="simditor-wysiwyg" name="description" required>{{ old('description', $item->translate('description', $locale)) }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Состав</label>

      <textarea class="simditor-wysiwyg" name="composition" required>{{ old('composition', $item->translate('composition', $locale)) }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Показания к применению</label>

      <textarea class="simditor-wysiwyg" name="indication" required>{{ old('indication', $item->translate('indication', $locale)) }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Способ применения</label>

      <textarea class="simditor-wysiwyg" name="use" required>{{ old('use', $item->translate('use', $locale)) }}</textarea>
    </div>
  </div> {{-- Fields for specific locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
