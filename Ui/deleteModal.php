<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm File Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete <span class="file-name">File</span> <span class="file-folder"></span>  ?
      <input type="hidden" class="delete-file-id" name="id" id="delete-file-id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal" aria-label="Close">No, Cancel</button>
        <button type="button" class="btn btn-danger" id="deleteButton">Yes, Delete</button>
      </div>
    </div>
  </div>
</div>
