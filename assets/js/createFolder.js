document.addEventListener('DOMContentLoaded',  function() {
	document.getElementById('create-folder-button').addEventListener('click', function(e) {
		e.preventDefault();

		var formData = new FormData();
		formData.append('foldername', document.getElementById('folderName').value);
		formData.append('path', path);

		const fetchIt=async()=>{
            
			const res=await fetch('controller/create-folder.php', {
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

