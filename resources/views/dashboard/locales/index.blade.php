@extends('dashboard.layouts.app')
@section('main')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          {{-- Empty space for checkbox --}}
          <th width="20"></th>

          <th>
            Заголовок
          </th>

          <th>
            Значение
          </th>

          <th>
            Позиция
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
          {{-- Checkbox for multidelete --}}
          @include('dashboard.components.table.checkbox-td')

          <td>{{ $item->title }}</td>
          <td>{{ $item->value }}</td>
          <td>
            @if($item->default) Основной язык сайта<br> @endif
            @if($item->default_for_dashboard) Основной язык админки @endif
          </td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              <a class="button button--main button--rounded" href="{{ route($modelTag . '.edit', $item->id) }}" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Редактировать">
                <span class="material-icons">edit</span>
              </a>

              @include('dashboard.components.table.remove-button')
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

  </div>
</div>

@include('dashboard.modals.destroy-single-item')
@include('dashboard.modals.destroy-multiple-items')

@endsection
