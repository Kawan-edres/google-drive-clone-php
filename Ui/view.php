<?php

function formatSizeUnits($bytes)
{
  if ($bytes >= 1073741824) {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  } elseif ($bytes >= 1048576) {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  } elseif ($bytes >= 1024) {
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  } elseif ($bytes > 1) {
    $bytes = $bytes . ' bytes';
  } elseif ($bytes == 1) {
    $bytes = $bytes . ' byte';
  } else {
    $bytes = '0 bytes';
  }

  return $bytes;
}


$dbhost = 'localhost';
$dbname = 'my_database';
$dbuser = 'root';
$dbpass = '';   

try {
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}


$path = $_GET['path'];
if ($path == '/') {
  // Retrieve files from the database
  $stmt = $dbh->prepare("SELECT id, filename,fileType, filesize,filePath, created_date, is_folder FROM files where filePath LIKE '%/%/%' AND filePath NOT LIKE '%/%/%/%'");
  
}else{
  $stmt = $dbh->prepare("SELECT id, filename,fileType, filesize,filePath, created_date, is_folder FROM files where filePath LIKE :path AND filePath NOT LIKE :notpath");
  // $stmt = $dbh->prepare("SELECT id, filename,fileType, filesize,filePath, created_date, is_folder FROM files where filePath like :path");
  $stmt->bindValue(':path', "%/".$path."/%");
  $stmt->bindValue(':notpath', "%/". $path ."/%/%");
}

$stmt->execute();
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo var_dump($files);

?>


<table id="render-table" class="table" style="width: 97%; margin:auto;">
  <thead>
    <tr>
      <th scope="col"> <input type="checkbox" id="select-all"> ID</th>
      <th scope="col">Filename</th>
      <th scope="col">Filesize</th>
      <th scope="col">Modified Date</th>
    </tr>
  </thead>

  <form id="fileform" method="post">
    <tbody>
      <?php foreach ($files as $file) : ?>
        <?php if ($path == str_replace("../uploads/", "", $file['filePath'])) continue ?>
        <tr>
          <td>
            <input type="checkbox" class="file-checkbox" data-file-id="<?php echo $file['id']; ?>" data-file-name="<?php echo $file['filename']; ?>" data-is-folder="<?php echo $file['is_folder']; ?>">
            <?php echo $file['id']; ?>
          </td>
          <td><?php echo $file['is_folder'] == 0 ? $file['filename'] : '<a href=?path=' . str_replace("../uploads/", "", $file['filePath']) . '>' . $file['filename'] . '</a>';  ?></td>
          <td><?php echo $file['is_folder'] == 0 ? formatSizeUnits($file['filesize']) : '-' ?></td>
          <td><?php echo $file['created_date']; ?></td>
        </tr>


      <?php endforeach; ?>
    </tbody>

  </form>
</table>


<!-- Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this file
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
