@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">
  <input type="hidden" name="locale" value="{{ $locale }}">

  {{-- Fields for specific locale start --}}
  <div class="form-section">
    @include('dashboard.components.form.specific-locale-fields-title')

    <div class="form-group">
      <label class="form-label required">Значение</label>

      <textarea class="{{ $item->wysiwyg ? 'simditor-wysiwyg' : 'form-textarea' }}" name="value" rows="6" required>{{ old('value', $item->translate('value', $locale)) }}</textarea>
    </div>
  </div> {{-- Fields for specific locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
  </div>

</form>

@endsection