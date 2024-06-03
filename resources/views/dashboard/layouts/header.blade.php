<header class="header">
  {{-- Toggler start --}}
  <div class="header__toggler-container">
    <h2 class="header__site-name">{{ env('APP_NAME') }}</h2>
    <button class="aside-toggler"><span class="material-icons"">menu</span></button>
  </div>  {{-- Toggler end --}}

  {{-- Body start --}}
  <div class=" header__body">
    {{-- Title start --}}
    <ul class="header__breadcrumbs">
      {{-- first level --}}
      <li>
        @switch($modelTag)
          @case('products') Продукты @break
          @case('categories') Категории @break
          @case('options') Тексты @break
          @case('achievements') Достижения @break
          @case('presence') Наше присутствие @break
          @case('stars') Звёзды @break
          @case('translations') Статик текст @break
          @case('locales') Языки @break
        @endswitch

        {{-- First levels items count --}}
        @if( strpos($route, 'index')) ({{ count($totalItems) }}) @endif
      </li>

      {{-- second level for CREATE --}}
      @if(strpos($route, 'create')) <li>Добавить</li> @endif

      {{-- second level as Link for translations & edit pages --}}
      @switch($route)
        @case('products.translations') @case('products.edit')
        @case('categories.translations') @case('categories.edit')
        @case('achievements.translations') @case('achievements.edit')
        @case('presence.translations') @case('presence.edit')
        @case('stars.translations') @case('stars.edit')
            <li><a href="{{ route($modelTag . '.translations', $item->id) }}">{{ $item->translateForDash('title') }}</a></li>
            @break

        @case('options.translations') @case('options.edit')
            <li><a href="{{ route($modelTag . '.translations', $item->id) }}">{{ $item->title }}</a></li>
            @break

        @case('locales.edit')
            <li><a href="{{ route($modelTag . '.edit', $item->id) }}">{{ $item->title }}</a></li>
            @break
      @endswitch

      {{-- Third level as Locale for translations & edit pages --}}
      @if(strpos($route, 'edit') && $route != 'locales.edit') <li>{{ $locale }}</li> @endif
    </ul> {{-- Title end --}}

    {{-- Actions start --}}
    <ul class="header__actions">
      {{-- Actions for index pages --}}
      @switch($route)
        @case('dashboard.index')
        @case('categories.dashboard.index')
        @case('achievements.dashboard.index')
        @case('presence.dashboard.index')
        @case('stars.dashboard.index')
        @case('locales.dashboard.index')
        <li>
          <a href="{{ route($modelTag . '.create') }}">
            <span class="material-icons">add</span> Добавить
          </a>
        </li>

        <li>
          <button data-action="select-all"><span class="material-icons">done_all</span> Отметить все</button>
        </li>

        <li>
          <button data-bs-toggle="modal" data-bs-target="#destroy-multiple-items-modal"><span class="material-icons">clear</span> Удалить отмеченные</button>
        </li>
        @break
      @endswitch
    </ul> {{-- Actions end --}}
  </div> {{-- Body start --}}
</header>
