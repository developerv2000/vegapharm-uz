@extends('dashboard.layouts.app')
@section('main')

<div class="alert alert-warning">
  Файл имеет структуру <b>"ключ" : "перевод"</b>
  <br>Вы можете менять переводы как угодно, но ни в коем случае не меняйте ключ, и объязательно сохраняйте структуру файла не изменённым!
  <br>При сбросе перевода, все значения будут скопированы из <a href="{{ route('translations.view-default') }}" target="_blank">файла по умолчанию</a>.
</div>

<form class="main-form" action="{{ route($modelTag . '.update') }}" method="POST" data-on-submit="validate-json" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="locale" value="{{ $locale }}">

  <div class="form-group">
    <pre id="json-display"></pre>
    <input type="hidden" name="content" id="json-input" value="{{ $jsonContent }}">
  </div>

  <div class="form-actions">
    <button class="button button--danger" type="submit" form="reset-translations-form">
      <span class="material-icons">restart_alt</span> Сбросить
    </button>

    @include('dashboard.components.form.update-button')
  </div>
</form>

<form class="visually-hidden" action="{{ route('translations.reset') }}" method="POST" id="reset-translations-form">
  @csrf
  <input type="hidden" name="locale" value="{{ $locale }}">
</form>

@endsection