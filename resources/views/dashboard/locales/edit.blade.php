@extends('dashboard.layouts.app')
@section('main')

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="show-spinner" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">

  <div class="form-section">
    <div class="form-group">
      <label class="form-label required">Заголовок</label>

      <input class="form-input" type="text" name="title" value="{{ old('title', $item->title) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label required">Значение (ru, en, kz, kg etc.)</label>

      <input class="form-input" type="text" name="value" value="{{ old('value', $item->value) }}" required />
    </div>

    <div class="form-group">
      <label class="form-label">Является основным языком сайта?</label>

      <input class="form-input" type="text" name="default" value="{{ $item->default ? 'Да' : 'Нет' }}" readonly />
    </div>

    <div class="form-group">
      <label class="form-label">Является основным языком админки?</label>

      <input class="form-input" type="text" name="default_for_dashboard" value="{{ $item->default_for_dashboard ? 'Да' : 'Нет' }}" readonly />
    </div>
  </div>

  <div class="form-actions">
    <button class="button button--secondary" type="submit" form="set-default-for-site">
      Сделать основным языком сайта
    </button>

    <button class="button button--secondary" type="submit" form="set-default-for-dashboard">
      Сделать основным языком админки
    </button>
  </div>

  <div class="form-actions">
    @include('dashboard.components.form.update-button')
    @include('dashboard.components.form.destroy-button')
  </div>

</form>

<form class="visually-hidden" action="{{ route('locales.set-as-default') }}" method="POST" id="set-default-for-site">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">
  <input type="hidden" name="for" value="site">
</form>

<form class="visually-hidden" action="{{ route('locales.set-as-default') }}" method="POST" id="set-default-for-dashboard">
  @csrf
  <input type="hidden" name="id" value="{{ $item->id }}">
  <input type="hidden" name="for" value="dashboard">
</form>

@include('dashboard.modals.destroy-single-item', ['itemId' => $item->id ])

@endsection
