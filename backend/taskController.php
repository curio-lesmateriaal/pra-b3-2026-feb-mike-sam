<?php
$action = $_POST['action'] ?? '';
if ($action === 'create') {
    $titel       = $_POST['titel'] ?? '';
    $afdeling    = $_POST['afdeling'] ?? '';
    $beschrijving= $_POST['beschrijving'] ?? '';
    
}
require_once 'conn.php';
$query = "INSERT INTO taken (titel, afdeling, beschrijving)
VALUES(:titel, :afdeling, :beschrijving)";

$statement = $conn->prepare($query);
$statement->execute([
":titel" => $_POST['titel'],
":afdeling" => $_POST['afdeling'],
":beschrijving" => $_POST['beschrijving'],
]);

header("Location: ../index.php ");


?>