<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

$sql2 = "SELECT * FROM posts";

$result2 = mysqli_query($mysqli, $sql2);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php while ($p = $result2->fetch_assoc()) : ?>
            <?php
            $sql3 = "SELECT * FROM users where id={$p["id_user"]}";
            $result3 = mysqli_query($mysqli, $sql3);
            $us = $result3->fetch_assoc();
            ?>
            <p> nom poste:<?= htmlspecialchars($p["nom_post"]) ?></p>
            <p> utilisateur:<?= htmlspecialchars($us["nom"]) ?></p>

        <?php endwhile; ?>
    </div>



</body>

</html>