<?php

$action = $_POST['action'] ?? '';
if ($action === 'create') {
    $title       = $_POST['title'] ?? '';
    $afdeling    = $_POST['afdeling'] ?? '';
    $beschrijving= $_POST['beschrijving'] ?? '';
    require_once 'conn.php';
}

$query = "INSERT INTO taken (titel, afdeling, beschrijving)
VALUES(:titel, :afdeling, :beschrijving)";

$statement = $conn->prepare($query);

$statement->execute([
":titel" => $titel,
":afdeling" => $afdeling,
":beschrijving" => $beschrijving,
]);

header("Location: ");


?>