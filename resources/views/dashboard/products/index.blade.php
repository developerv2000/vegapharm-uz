@extends('dashboard.layouts.app')
@section('main')

@include('dashboard.components.search')

<div class="main-table-container">
  <div class="main-table-container__inner">

    <table class="main-table" cellpadding="8" cellspacing="10">
      {{-- Table Head start --}}
      <thead>
        <tr>
          @php $reversedOrderType = App\Support\Helper::reverseOrderType($orderType); @endphp

          {{-- Empty space for checkbox --}}
          <th width="20"></th>

          <th width="100">
            Изображ.
          </th>

          {{-- empty space as img/text divider --}}
          <th width="30"></th>

          <th>
            <a class="{{ $orderType }} {{ $orderBy == 'title' ? 'active' : '' }}"
              href="{{ route('dashboard.index') }}?page={{ $activePage }}&orderBy=title&orderType={{ $reversedOrderType }}">Заголовок</a>
          </th>

          <th>
            <a class="{{ $orderType }} {{ $orderBy == 'prescription' ? 'active' : '' }}"
              href="{{ route('dashboard.index') }}?page={{ $activePage }}&orderBy=prescription&orderType={{ $reversedOrderType }}">Рецептурность</a>
          </th>

          <th>
            Категория
          </th>

          <th>
            <a class="{{ $orderType }} {{ $orderBy == 'popular' ? 'active' : '' }}"
              href="{{ route('dashboard.index') }}?page={{ $activePage }}&orderBy=popular&orderType={{ $reversedOrderType }}">Популярность</a>
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

          <td><img src="{{ asset('img/products/thumbs/' . $item->translateForDash('image')) }}"></td>
          {{-- empty space as img/text divider --}}
          <td></td>
          <td>{{ $item->translateForDash('title') }}</td>
          <td>{{ $item->prescription ? 'RX' : 'OTC' }}</td>
          <td>
            @foreach ($item->categories as $category)
            {{ $category->translateForDash('title') }} <br>
            @endforeach
          </td>
          <td>{{ $item->popular ? 'Популярный' : '' }}</td>

          {{-- Actions --}}
          <td>
            <div class="table__actions">
              @include('dashboard.components.table.view-link')
              @include('dashboard.components.table.translations-link')
              @include('dashboard.components.table.remove-button')
            </div>
          </td>
        </tr>
        @endforeach
      </tbody> {{-- Table Body end --}}
    </table>

    {{ $items->links('dashboard.layouts.pagination') }}
  </div>
</div>

@include('dashboard.modals.destroy-single-item')
@include('dashboard.modals.destroy-multiple-items')

@endsection