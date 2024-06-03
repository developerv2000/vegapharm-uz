@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.store') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf

  {{-- Fields for main locale start --}}
  <div class="form-section">
    @include('dashboard.components.form.seperate-fields-title')

    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title') }}" required />
    </div>
  </div> {{-- Fields for main locale end --}}

  <div class="form-actions">
    @include('dashboard.components.form.store-button')
  </div>

</form>

@endsection