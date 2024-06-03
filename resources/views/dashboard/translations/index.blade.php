@extends('dashboard.layouts.app')
@section('main')

<div class="alert alert-warning">
  Русский язык (ru) использован как язык по умолчанию при разработке сайта. Вы не сможете менять статистический текст русского языка!
</div>

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          <th>
            Заголовок
          </th>

          <th>
            Значение
          </th>

          <th width="140">
            Действие
          </th>
        </tr>
      </thead> {{-- Table Head end --}}

      {{-- Table Body start --}}
      <tbody>
        @foreach ($items as $item)
        <tr>
          <td>{{ $item->title }}</td>
          <td>{{ $item->value }}</td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              <a class="button button--main button--rounded" href="{{ route($modelTag . '.edit', $item->value) }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Редактировать">
                <span class="material-icons">edit</span>
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

  </div>
</div>

@endsection
