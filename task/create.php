<!doctype html>
<html lang="nl">

<head>
    <title>Taakbord</title>
    <?php require_once '../head.php'; ?>
</head>

<body>
    <?php require_once 'header.php'; ?>
   <div class="container">
        <h1>Nieuwe melding</h1>

        <form action="<?php echo $base_url; ?>../backend/taskController" method="POST">

            <div class="form-group">
                <label for="titel">Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input" required>
            </div>
            <div class="form-group">
                <label for="afdeling">Afdeling</label>
                <select name="afdeling" id="afdeling" required>
                    <option value="">– kies een afdeling –</option>
                    <option value="personeel">Personeel</option>
                    <option value="horeca">Horeca</option>
                    <option value="techniek">Techniek</option>
                    <option value="inkoop">Inkoop</option>
                    <option value="klantenservice">Klantenservice</option>
                    <option value="groen">Groen</option>
                </select>
            </div>
            <div class="form-group">
                <label for="beschrijving">Beschrijving:</label>
                <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>
            </div>

            <input type="submit" value="Verstuur melding">

        </form>
    </div>
</body>

</html>
