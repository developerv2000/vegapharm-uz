<div class="search-container">
  <div class="search-container__inner">
    <select class="selectize-singular-linked" placeholder="Поиск...">
      <option></option>
      @foreach($totalItems as $item)
        <option value="{{ route($modelTag . '.translations' , $item->id) }}">{{ $item->title }}</option>
      @endforeach
    </select>
  </div>
</div>
