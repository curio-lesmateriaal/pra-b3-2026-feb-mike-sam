<?php

$action = $_POST['action'] ?? '';
if ($action === 'create') {
    $title       = $_POST['title'] ?? '';
    $afdeling    = $_POST['afdeling'] ?? '';
    $beschrijving= $_POST['beschrijving'] ?? '';
    require_once 'conn.php';
}



?>