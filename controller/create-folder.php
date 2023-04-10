<?php

// Connect to the database

use function PHPSTORM_META\type;

echo json_encode($_POST);

require_once '../config/db.php  ';


// Check if a file was uploaded
if (isset($_POST['foldername'])) {

    // Get file information
    $fodlername = $_POST['foldername'];
    $path = $_POST['path'];

    if (!is_dir('../uploads')) {
        mkdir('../uploads');
    }

    $filePath = '';

    if ($path == '/') {
        $filePath = "../uploads/" . $fodlername;
    } else {
        $filePath = "../uploads/" . $path . "/" . $fodlername;
    }
    mkdir($filePath);


    $stmt = $dbh->prepare("INSERT INTO files
         (filename,filePath,filetype, filesize, created_date, content, is_folder)
         VALUES (:filename,:filePath, :filetype, :filesize, NOW(), :content, 1)");

    $stmt->bindValue(':filename', $fodlername);
    $stmt->bindValue(':filePath', $filePath);
    $stmt->bindValue(':filetype', '');
    $stmt->bindValue(':filesize', 1);
    $stmt->bindValue(':content', '');

    $stmt->execute();

    echo 'Folder created successfully.';
} else {
    echo 'There was an error creating the Folder.';
}
