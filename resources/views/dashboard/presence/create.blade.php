@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  {{-- Same filds for all languages start --}}
  <div class="form-section">
    @include('dashboard.components.form.same-fields-title')

    <div class="form-group">
      <label class="form-label required">Тип</label>

      <select class="selectize-singular" name="type" required>
        <option value="city">Город</option>
        <option value="country">Страна</option>
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
      <label class="form-label required">Адрес</label>

      <input class="form-input" type="text" name="address" value="{{ old('address') }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Телефон</label>

      <input class="form-input" type="text" name="phone" value="{{ old('phone') }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Почта</label>

      <input class="form-input" type="text" name="email" value="{{ old('email') }}" required />
    </div>
  </div> {{-- Fields for main locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection