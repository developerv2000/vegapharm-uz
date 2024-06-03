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
      <label class="form-label required">Год</label>

      <input class="form-input" type="text" name="year" value="{{ old('year', $item->year) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label">Изображение</label>

      <input class="form-input" type="file" name="image" accept=".png, .jpg, .jpeg" data-action="display-local-image" data-target="local-image">
      <img class="form-image" data-id="local-image" src="{{ asset('img/achievements/' . $item->image) }}">
    </div>
  </div> {{-- Same filds for all languages end --}}

  {{-- Fields for specific locale start --}}
  <div class="form-section">
    @include('dashboard.components.form.specific-locale-fields-title')

    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title', $item->translate('title', $locale)) }}" required />
    </div>
  </div> {{-- Fields for specific locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection