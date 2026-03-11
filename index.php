<!doctype html>
<html lang="nl">

<head>
    <title>Taakbord</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <?php require_once 'task/header.php'; ?>
    <div class="container">
    </div>
</body>

</html>
<!doctype html>
<html lang="nl">

<head>
    <title>Taakbord</title>
    <?php require_once 'head.php'; ?>
</head>

<body>
    <?php require_once 'task/header.php'; ?>
    
    <div class="container home">

        <h1>Taken:</h1>

        <?php
        require_once 'backend/conn.php';
        $query = "SELECT * FROM taken";
        $statement = $conn->prepare($query);
        $statement->execute();
        $taken = $statement->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <Table>
        <tr>
            <th>Titel</th>
            <th>Afdeling</th>
            <th>Beschrijving</th>
            <th>Aanpassen</th>
        </tr>
        <?php foreach($taken as $taak): ?>
            <tr>
                <td><?php echo $taak['titel']; ?></td>
                <td><?php echo $taak['afdeling']; ?></td>
                <td><?php echo $taak['beschrijving']; ?></td>
                <td><a href="task/edit.php?id=<?php echo $taak['id']; ?>">aanpassen</a></td>
            </tr>
        <?php endforeach; ?>
    </Table>
    </div>

</body>

</html>
