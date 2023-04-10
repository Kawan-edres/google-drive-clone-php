async function processDelete() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

    for (const checkbox of checkboxes) {
        console.log(checkbox);
        const modal = $('#deleteModal');
        modal.find('.file-name').text(checkbox.dataset.fileName);
        modal.find('.file-folder').text(checkbox.dataset.isFolder == true ? 'Folder' : 'File');
        modal.find('.delete-file-id').val(checkbox.dataset.fileId);
        modal.modal('show');

        // Wait for the modal to close before moving on to the next iteration
        await waitForModalToClose(modal);
    }
    const res= await fetch('Ui/view.php?path='+path)
    const data= await res.text();
    document.querySelector("#render-table").innerHTML = data;
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('delete-button').addEventListener('click', function (e) {
        // e.preventDefault();
        processDelete();
    });

    document.getElementById('deleteButton').addEventListener('click', async function (e) {

        const checkboxes = document.querySelectorAll('.file-checkbox:checked');
        const fileIds = Array.from(checkboxes).map(checkbox => checkbox.dataset.fileId);

        if (fileIds.length === 0) {
            alert('Please select at least one file to delete.');
            return;
    }
        console.log(document.getElementById('delete-file-id').value);
        try {
            const response = await fetch('controller/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ "fileIds": [document.getElementById('delete-file-id').value] }),
            });
            console.log(response);
            // if (data.success) {
            //     location.reload();
            // } else {
            //     // alert(data.error);
            // }
        } catch (error) {
            console.error(error);
            // alert('An error occurred while deleting the files.');
        }

        // fetchIt();
        $('#deleteModal').modal('hide');


    });
});