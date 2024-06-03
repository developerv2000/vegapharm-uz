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
      <label class="form-label required">Тип</label>

      <select class="selectize-singular" name="type" required>
        <option value="city" @selected($item->type == 'city')>Город</option>
        <option value="country" @selected($item->type == 'country')>Страна</option>
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
      <label class="form-label required">Адрес</label>

      <input class="form-input" type="text" name="address" value="{{ old('address', $item->translate('address', $locale)) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Телефон</label>

      <input class="form-input" type="text" name="phone" value="{{ old('phone', $item->translate('phone', $locale)) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Почта</label>

      <input class="form-input" type="text" name="email" value="{{ old('email', $item->translate('email', $locale)) }}" required />
    </div>
  </div> {{-- Fields for specific locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection