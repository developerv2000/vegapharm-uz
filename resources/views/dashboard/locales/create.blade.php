@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  <div class="form-section">
    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Значение (ru, en, kz, kg etc.)</label>

      <input class="form-input" type="text" name="value" value="{{ old('value') }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Выберите языка, от которого новый язык унаследует все его данные. Изначальный перевод нового языка будет иметь данные выбранного языка, кроме статистического текста! Перевод статистического текста будет скопирован из <a href="{{ route('translations.view-default') }}" target="_blank">файла по умолчанию</a></label>

      <select class="selectize-singular" name="inherit_from_locale" required>
        @foreach ($locales as $loc)
          <option value="{{ $loc->value }}">{{ $loc->title }}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection
