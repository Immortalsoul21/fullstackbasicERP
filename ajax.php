<?php

session_start();
$db = new PDO('mysql:host=localhost;dbname=finance', 'root', "");

$customerCode = $_GET['code'];

$sql = "SELECT cu_fname FROM customer WHERE cu_customerid = ?";
$stmt = $db->prepare($sql);

$stmt->execute([$customerCode]);

if ($stmt->rowCount() > 0) {
    $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['error' => 0, 'txtName' => $customer['cu_fname']]);
} else {
    echo json_encode(['error' => 1, 'txteName' => '']);
}
?>