@extends('dashboard.layouts.app')
@section('main')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          {{-- empty space as padding-left --}}
          <th width="20"></th>

          <th width="100">
            Язык
          </th>

          <th>
            Заголовок
          </th>

          <th width="140">
            Действие
          </th>
        </tr>
      </thead> {{-- Table Head end --}}

      {{-- Table Body start --}}
      <tbody>
        @foreach ($item->translations as $tr)
        <tr>
          {{-- empty space as padding-left --}}
          <td></td>
          <td>{{ $tr->locale }}</td>
          <td>{{ $tr->title }}</td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              @include('dashboard.components.table.edit-link')
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

  </div>
</div>

@endsection