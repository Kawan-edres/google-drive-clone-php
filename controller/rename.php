<?php


// Initialize the response array
$response = array('success' => false, 'message' => '');

if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $current_filename = $_POST['file_name'];
    $date = date('Y-m-d H:i:s');

    echo "exist".file_exists("../uploads/".$current_filename)."<br>";

    
    if (file_exists("../uploads/".$current_filename)) {
        if (rename("../uploads/".$current_filename, "../uploads/".$name)) {
            echo "File renamed successfully.";
        } else {
            echo "Error renaming file.";
        }
    } else {
        echo "File does not exist.";
    }


    try {
        require_once '../config/db.php  ';

        
        $stmt = $dbh->prepare("UPDATE files SET filename = :filename,created_date=:created_date	 WHERE id = :id");
        $stmt->bindParam(':filename', $name);
        $stmt->bindParam(':created_date',$date);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $response['success'] = true;
        $response['message'] = "File renamed successfully.";
    } catch (PDOException $e) {
        $response['message'] = 'Error renaming file: ' . $e->getMessage();
    }
}

// Send the response as JSON
echo json_encode($response);
