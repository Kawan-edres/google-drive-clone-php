
<div class="modal fade" id="newFolderModal" tabindex="-1" aria-labelledby="newFolderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New Folder</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          Are you sure want to create this folder
        </p>
        <br>
        <input type="text" class="form-control" placeholder="Folder Name" id="folderName" title="Invalid Folder Name" pattern="[a-zA-Z0-9_-]*[a-zA-Z0-9][a-zA-Z0-9_.-]*">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="create-folder-button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

