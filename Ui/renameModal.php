<div class="modal fade" id="RenameModal" tabindex="-1" aria-labelledby="renameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Rename</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          Are you sure want to rename this file/folder
        </p>
        <br>
        <input type="text" class="form-control rename-file-input"  placeholder="New Name" id="name" title="Invalid Folder/file Name">
        <input type="hidden" class="form-control rename-file-id" id="file-id">
        <input type="hidden" class="form-control rename-file-name" id="file-name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="rename-button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>