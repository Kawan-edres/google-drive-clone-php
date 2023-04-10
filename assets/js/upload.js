document.addEventListener('DOMContentLoaded',  function() {
	document.getElementById('submit').addEventListener('click', function(e) {
		e.preventDefault();

		var formData = new FormData();
		formData.append('file', document.getElementById('file').files[0]);
		formData.append('path', path);
		
		const fetchIt=async()=>{
            
			const res=await fetch('controller/upload.php', {
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
		
	});
});