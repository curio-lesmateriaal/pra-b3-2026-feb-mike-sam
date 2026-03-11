<!doctype html>
<html lang="nl">

<head>
    <title>Taaken aanpassen</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>

    <div class="container">
        <h1>Aanpassen bericht</h1>

       <?php
        require_once '../backend/conn.php';

        $id = $_GET['id'];
        $query = "SELECT * FROM taken";
        $statement = $conn->prepare($query);
        $statement->execute();
        $taken = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="titel">Titel:</label>
            <input type="text" name="titel" value="<?php echo $taak['titel']; ?>">

            <label for="beschrijving">Beschrijving:</label>
            <textarea name="beschrijving"><?php echo $taak['beschrijving']; ?></textarea>

            <input type="submit" value="Opslaan">             
        </form>
        
        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $bericht['id']; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>  

</body>
</html>