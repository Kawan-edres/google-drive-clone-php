<?php



// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    require_once '../config/db.php  ';



    $fileIds = json_decode(file_get_contents('php://input'), true)['fileIds'];
    $stmt = $dbh->prepare('DELETE FROM files WHERE id = ?');
        

    foreach ($fileIds as $fileId) {
    $stmt->execute([$fileId]);
}
        
$response = ['success' => true];

// output the JSON response
header('Content-Type: application/json');
echo json_encode($response);


}
?>
