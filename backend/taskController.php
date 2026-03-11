<?php
$action = $_POST['action'] ?? '';
if ($action === 'create') {
    
    $titel = trim($_POST['titel'] ?? '');
    if ($titel === '') {
        die("Vul een titel in");
    }

    $beschrijving = ($_POST['beschrijving'] ?? '');
    if ($beschrijving === '') {
        die("Vul de beschrijving in");
    }
    
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

header("Location: ../index.php?msg=Taak succesvol aangemaakt");


?>