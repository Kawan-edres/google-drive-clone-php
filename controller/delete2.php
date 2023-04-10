<?php

// Set the path to the directory where files are stored
$directory = 'uploads/';

// Get the IDs of the files to be deleted from the request body
$fileIds = json_decode(file_get_contents('php://input'));

// Loop through each ID and delete the corresponding file
foreach ($fileIds as $fileId) {
    $filePath = $directory . $fileId;
    
    // Check if the file exists before attempting to delete it
    if (file_exists($filePath)) {
        unlink($filePath);
    }
}

// Return a success response
echo json_encode(['success' => true]);

?>