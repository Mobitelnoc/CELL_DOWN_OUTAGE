<?php
require_once 'database.php';
$stmt = $conn->prepare('select * from product');
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);
?>
