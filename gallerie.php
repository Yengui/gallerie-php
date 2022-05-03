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

    $sql2 = "SELECT * FROM posts";

    $result2 = mysqli_query($mysqli, $sql2);
}else{
$mysqli = require __DIR__ . "/database.php";
$sql2 = "SELECT * FROM posts";

$result2 = mysqli_query($mysqli, $sql2);

}

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
    <title>Document</title>
</head>

<body>

<div class="navbarcontainer">
        <div class="logo">Ma <span>Gallerie</span></div>
        <div class="navbar1">
            <div class="nav-btn"><a href="./#">accueil</a></div>
            <div class="nav-btn"><a href="./gallerie.php">gallerie</a></div>
            <div class="nav-btn"><a href="./#meilleurs">meilleurs</a></div>
            <div class="nav-btn"><a href="./#temoignages">temoignages</a></div>
        </div>
        <?php if (isset($user)) : ?>
            <div class="navbar2">
                <a href="./profile.php" style="text-decoration: none;">
                    <div class="inscription">mon profil</div>
                </a>

                <a href="./logout.php" style="text-decoration: none;">
                    <div class="connecter">déconnexion</div>
                </a>
            </div>
        <?php else : ?>

            <div class="navbar2">
                <a href="./login.php">
                    <div class="connecter">se connecter</div>
                </a>
                <a href="./signup.php">
                    <div class="inscription">s'inscrire</div>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <h1>Toutes les pièces d'art</h1>
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    <div class="gallerieContainer">
        <?php
        while ($p = $result2->fetch_assoc()) {
            //fetch current user from db using $post["id_user"] and put it in a variable called $currentUser (inside the foreach)
            $sql3 = "SELECT * FROM users
            WHERE id = {$p["id_user"]}";
            $result3 = $mysqli->query($sql3);
            $currentUser = $result3->fetch_assoc();
            $name=$p["nom_post"];
            echo "<div class='carte'>
                <img class='carte-img' src='./uploads/" . $p["nom_photo"] . "' alt='design'>
                <div class='carte-partie2'>
                    <div class='img-info'>
                        <div class='img-titre'><a href='./post.php?id=" . $p["id_post"] . "'> $name</a></div>
                        <div class='img-description'>" . $p["descrip"] . "</div>
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
    <br>
    <br>
    <br>
    <br>

    <section class="footer">
        <div class="custom-shape-divider-top-1650420830">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="flexfooterhorizontal">
            <div class="flexfooter">
                <div>
                    <h1>Ma <span>Gallerie</span></h1>
                </div>
                <div class="fsocials">
                    <a target="_blank" href="http://facebook.com/">
                        <div class="fsocial"><i class="fa fa-facebook"></i></div>
                    </a>

                    <a target="_blank" href="http://instagram.com/">
                        <div class="fsocial"><i class="fa fa-instagram"></i></div>
                    </a>

                    <a target="_blank" href="http://whatsapp.com/">
                        <div class="fsocial"><i class="fa fa-whatsapp"></i></div>
                    </a>

                </div>
                <div class="contactinfo">
                    <div><i class="fa fa-phone"></i> +216 22 222 222</div>
                    <div><i class="fa fa-at"></i> email@email.com</div>
                </div>
            </div>
            <img class="footerimg" src="./images/footericon.png" alt="art">
        </div>
    </section>
    <script src="./scripts/script.js"></script>


</body>

</html>