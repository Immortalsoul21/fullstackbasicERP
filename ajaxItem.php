<?php

session_start();
/*$db = new PDO('mysql:host=localhost;dbname=finance', 'root', "");

$itemcode = $_GET['code'];

$sql = "SELECT It_codeno,It_description,It_rate FROM item WHERE It_codeno = ?";
$stmt = $db->prepare($sql);

$stmt->execute([$itemcode]);

if ($stmt->rowCount() > 0) {
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(['error' => 0, 'txtName' => $item['It_description']]);
    echo json_encode(['error' => 0, 'txtRate' => $item['It_rate']]);
} else {
    echo json_encode(['error' => 1, 'txtName' => 'Hi']);
}*/


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die ("Connection failed: " . $e->getMessage());
}

$itemcode = 0;

if (isset ($_GET["code"]) && !empty($_GET["code"])) {
    $itemcode = $_GET["code"];
}
$sql = "SELECT It_description, It_rate FROM item WHERE It_codeno =" . $itemcode;
$stmt = $conn->prepare($sql);
// $stmt->bindParam(':code', $itemCode);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $response[] = array("txtDescription" => $result['It_description'], "txtPrice" => $result['It_rate']);
} else {
    $response[] = array("txtDescription"=>"item not found", "txtPrice" => "not found");
}


echo json_encode($response);
?>