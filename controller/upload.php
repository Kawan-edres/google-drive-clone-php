<?php

// Connect to the database

use function PHPSTORM_META\type;

require_once '../config/db.php  ';


// Check if a file was uploaded
if (isset($_FILES['file'])) {

    // Get file information
    $filename = $_FILES['file']['name'];
    $filetype = $_FILES['file']['type'];
    $file_extension = end(explode('/', $_FILES['file']['type']));
    $filesize = $_FILES['file']['size'];
    $filetmpname = $_FILES['file']['tmp_name'];
    $fileerror = $_FILES['file']['error'];
    $path = $_POST['path'];

    if (!is_dir('../uploads')) {
        mkdir('../uploads');
    }

    $file = $_FILES['file'] ?? null;
    $filePath = '';
    if ($file && $file['tmp_name']) {
        if ($path == '/') {
            $filePath = '../uploads/' . $file['name'];
        } else {
            $filePath = '../uploads/' . $path . "/" . $file['name'];
        }
        move_uploaded_file($file['tmp_name'], $filePath);
    }


    if ($fileerror === UPLOAD_ERR_OK) {
        $filecontent = file_get_contents($filetmpname);

        $stmt = $dbh->prepare("INSERT INTO files
         (filename,filePath,filetype, filesize, created_date, content,is_folder)
         VALUES (:filename,:filePath, :filetype, :filesize, NOW(), :content,0)");

        $stmt->bindParam(':filename', $filename);
        $stmt->bindParam(':filePath', $filePath);
        $stmt->bindParam(':filetype', $file_extension);
        $stmt->bindParam(':filesize', $filesize);
        
        $stmt->bindParam(':content', $filecontent, PDO::PARAM_LOB);

        $stmt->execute();

        echo 'File uploaded successfully.';
    } else {
        echo 'There was an error uploading the file.';
    }
}
