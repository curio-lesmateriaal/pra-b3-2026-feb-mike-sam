<?php
require_once 'conn.php';

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
    
    $query = "INSERT INTO taken (titel, afdeling, beschrijving)
    VALUES(:titel, :afdeling, :beschrijving)";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $_POST['titel'],
        ":afdeling" => $_POST['afdeling'],
        ":beschrijving" => $_POST['beschrijving'],
    ]);

    header("Location: ../index.php?msg=Taak succesvol aangemaakt");
}
elseif ($action === 'edit') {
    
    $id = $_POST['id'] ?? '';
    $titel = trim($_POST['titel'] ?? '');
    if ($titel === '') {
        die("Vul een titel in");
    }

    $beschrijving = ($_POST['beschrijving'] ?? '');
    if ($beschrijving === '') {
        die("Vul de beschrijving in");
    }

    $query = "UPDATE taken SET titel = :titel, afdeling = :afdeling, beschrijving = :beschrijving WHERE id = :id";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":titel" => $titel,
        ":afdeling" => $_POST['afdeling'],
        ":beschrijving" => $beschrijving,
        ":id" => $id
    ]);

    header("Location: ../index.php?msg=Taak succesvol aangepasst");
}
elseif ($action === 'delete') {
    
    $id = $_POST['id'] ?? '';
    if ($id === '') {
        die("ID ontbreekt");
    }

    $query = "DELETE FROM taken WHERE id = :id";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id
    ]);

    header("Location: ../index.php?msg=Taak succesvol verwijderd");
}
?>