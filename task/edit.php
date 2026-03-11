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
        $query = "SELECT * FROM taken WHERE id = :id";
        $statement = $conn->prepare($query);
        $statement->execute(["id" => $id]);
        $taak = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="titel">Titel:</label>
            <input type="text" name="titel" value="<?php echo $taak['titel']; ?>">
            
             <label for="afdeling">Afdeling</label>
                <select name="afdeling" id="afdeling" required>
                    <option value="">– kies een afdeling –</option>
                    <option value="personeel" <?php echo ($taak['afdeling'] === 'personeel') ? 'selected' : ''; ?>>Personeel</option>
                    <option value="horeca" <?php echo ($taak['afdeling'] === 'horeca') ? 'selected' : ''; ?>>Horeca</option>
                    <option value="techniek" <?php echo ($taak['afdeling'] === 'techniek') ? 'selected' : ''; ?>>Techniek</option>
                    <option value="inkoop" <?php echo ($taak['afdeling'] === 'inkoop') ? 'selected' : ''; ?>>Inkoop</option>
                    <option value="klantenservice" <?php echo ($taak['afdeling'] === 'klantenservice') ? 'selected' : ''; ?>>Klantenservice</option>
                    <option value="groen" <?php echo ($taak['afdeling'] === 'groen') ? 'selected' : ''; ?>>Groen</option>
                </select>

            <label for="beschrijving">Beschrijving:</label>
            <textarea name="beschrijving"><?php echo $taak['beschrijving']; ?></textarea>

            <input type="submit" value="Opslaan">             
        </form>
        
        <form action="../backend/taskController.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $taak['id']; ?>">
            <input type="submit" value="Verwijder bericht">
        </form>

    </div>  

</body>
</html>