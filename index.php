<?php
if (!isset($_GET['path'])) {

    header('Location: '.$_SERVER['REQUEST_URI'].'?path=/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drive</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <?php include_once "Ui/navbar.php" ?>
  <?php include_once "Ui/secondNav.php" ?>

  <form class="mb-3 mt-5 d-flex" style="width: 97%; margin:auto;" method="POST" enctype="multipart/form-data">
    <input class="form-control" name="file" type="file" id="file">
    <button type="submit" name="submit" id="submit" class="btn btn-primary">Upload</button>
  </form>


  <?php include_once "Ui/view.php"; ?>






  <script>
    // Select all checkbox functionality
    let selectAllCheckbox = document.getElementById('select-all');
    let fileCheckboxes = document.querySelectorAll('.file-checkbox');
    selectAllCheckbox.addEventListener('change', () => {
      fileCheckboxes.forEach((checkbox) => {
        checkbox.checked = selectAllCheckbox.checked;
      });
    });

    // let renameBtn = document.getElementById("rename-btn");
    // renameBtn.addEventListener("click", () => {
    //   alert("hello");
    // })
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="assets/js/path.js"></script>
  <script src="assets/js/upload.js"></script>
  <script src="assets/js/rename.js"></script>
  <script src="assets/js/delete.js"></script>
  <script src="assets/js/createFolder.js"></script>
<script>
  $(".new-folder").click(function(){
		$('#newFolderModal').modal('show');
	});

  function waitForModalToClose(modalElement) {
  return new Promise((resolve) => {
    $(modalElement).on('hidden.bs.modal', () => {
      resolve();
    });
  });
}

</script>

<?php
require_once './Ui/newFolderModal.php';
require_once './Ui/renameModal.php';
require_once './Ui/deleteModal.php';

 ?>





</body>

</html>