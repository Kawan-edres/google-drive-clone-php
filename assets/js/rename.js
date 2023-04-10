async function processRename() {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

  for (const checkbox of checkboxes) {
    console.log(checkbox);
    const modal = $('#RenameModal');
    modal.find('.rename-file-input').val(checkbox.dataset.fileName);
    modal.find('.rename-file-name').val(checkbox.dataset.fileName);
    modal.find('.rename-file-id').val(checkbox.dataset.fileId);
    modal.modal('show');

    // Wait for the modal to close before moving on to the next iteration
    await waitForModalToClose(modal);
  }
}

document.addEventListener('DOMContentLoaded',  function() {
  document.getElementById('rename-folder').addEventListener('click', function(e) {
    // e.preventDefault();
    processRename();
	});

document.getElementById('rename-button').addEventListener('click', function(e) {
  
  var formData = new FormData();
  formData.append('id', document.getElementById('file-id').value);
  formData.append('file_name', document.getElementById('file-name').value);
  formData.append('name', document.getElementById('name').value);
  formData.append('path', path);
  
  console.log(document.getElementById('name').value);

  const fetchIt=async()=>{
          
    const res=await fetch('controller/rename.php', {
      method: 'POST',
      body: formData
    })

    if(res.ok){
      const res=await fetch('Ui/view.php?path='+path)
      const data=await res.text();
      document.querySelector("#render-table").innerHTML = data;
    }

  }

  fetchIt();
  $('#newFolderModal').modal('hide');


  });  
});

