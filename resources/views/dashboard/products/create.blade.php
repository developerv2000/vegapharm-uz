@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  {{-- Same filds for all languages start --}}
  <div class="form-section">
    @include('dashboard.components.form.same-fields-title')

    <div class="form-group">
      <label class="form-label required">Рецептурность продукта</label>

      <select class="selectize-singular" name="prescription" required>
        <option value="0">OTC</option>
        <option value="1" selected>RX</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Категории</label>

      <select class="selectize-multiple" name="categories[]" multiple="multiple" required>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Добавить в популярные продукты?</label>

      <select class="selectize-singular" name="popular" required>
        <option value="0">Нет</option>
        <option value="1" selected>Да</option>
      </select>
    </div>

    <div class="form-group">
      <label class="form-label required">Отображать в баннере на странице все продукты?</label>

      <select class="selectize-singular" name="displayOnGreeting" required>
        <option value="0">Нет</option>
        <option value="1">Да</option>
      </select>
    </div>
  </div> {{-- Same filds for all languages end --}}

  {{-- Fields for main locale start --}}
  <div class="form-section">
    @include('dashboard.components.form.seperate-fields-title')

    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Изображение. Все изображения продуктов должны иметь одинаковую пропорцию!</label>

      <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image" required>
      <img class="form-image" data-id="local-image" src="{{ asset('img/dashboard/default-image.png') }}">
    </div>

    <div class="form-group">
      <label class="form-label required">Инструкция</label>

      <input class="form-input" type="file" name="instruction" accept=".pdf" required>
    </div>

    <div class="form-group">
      <label class="form-label required">Описание</label>

      <textarea class="simditor-wysiwyg" name="description" required>{{ old('description') }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Состав</label>

      <textarea class="simditor-wysiwyg" name="composition" required>{{ old('composition') }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Показания к применению</label>

      <textarea class="simditor-wysiwyg" name="indication" required>{{ old('indication') }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label required">Способ применения</label>

      <textarea class="simditor-wysiwyg" name="use" required>{{ old('use') }}</textarea>
    </div>
  </div> {{-- Fields for main locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection