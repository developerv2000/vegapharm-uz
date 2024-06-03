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

          <th width="100">
            Изображ.
          </th>

          {{-- empty space as img/text divider --}}
          <th width="30"></th>

          <th>
            Название
          </th>

          <th width="500">
            Описание
          </th>

          <th>
            Инструкция
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
          <td><img src="{{ asset('img/products/thumbs/' . $tr->image) }}"></td>
          {{-- empty space as img/text divider --}}
          <td></td>
          <td>{{ $tr->title }}</td>
          <td>{{ App\Support\Helper::cleanText($tr->description, 140) }}</td>
          <td><a class="table-source-link" href="{{ asset('instructions/' . $tr->instruction) }}" target="_blank">{{ $tr->instruction }}</a></td>

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