<?php
//change the logic of the page, just fetch all the posts and put them in a variable called $posts
//delete everything unnecessary, it is a simple page
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
    <link rel="stylesheet" href="./styles/gallerie.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/wave.css">
    <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallerie</title>
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

    <h1>Toutes les pièces d'art</h1>
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    <div class="gallerieContainer">
        <?php
        foreach ($posts as $post) {
            //fetch current user from db using $post["id_user"] and put it in a variable called $currentUser (inside the foreach)
            echo "<div class='carte'>
                <img class='carte-img' src='./uploads/" . $post["nom_photo"] . "' alt='design'>
                <div class='carte-partie2'>
                    <div class='img-info'>
                        <div class='img-titre'><a href='./post.php?id=" . $post["id"] . "'>Dessin sur bois</a></div>
                        <div class='img-description'>" . $post["desc"] . "</div>
                    </div>
                    <div class='utilisateur-info'>
                        <img class='utilisateur-carte' src='./uploads/" . $currentUser["photo"] . "' alt='utilisateur'>
                        <div><a href='./profile.php?id=" . $currentUser["id"] . "'>" . $currentUser["prenom"] . " " . $currentUser["nom"] . "</a></div>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>


</body>

</html>