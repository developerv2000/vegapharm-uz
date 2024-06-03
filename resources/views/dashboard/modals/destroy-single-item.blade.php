<div class="modal fade" id="destroy-single-item-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" action="{{ route($modelTag . '.destroy') }}" method="POST">
      @csrf

      {{-- Set default value on items edit page
      OR set value null for index pages --}}
      <input class="destroy-single-item-modal-input" type="hidden" value="{{ isset($itemId) ? $itemId : '' }}" name="id" />

      <div class="modal-header">
        <h5 class="modal-title">Удалить</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        Вы уверены что хотите удалить ?
      </div>

      <div class="modal-footer">
        <button type="button" class="button button--secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="button button--danger">Удалить</button>
      </div>
    </form>
  </div>
</div>
