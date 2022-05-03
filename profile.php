<?php

/* if (isset($_GET["id"])) {
    //get user by that id if he doesnt exist redirect user to index.php
    //if he exists put him in $user
} else {
    session_start();

    if (isset($_SESSION["user_id"])) {

        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }
}

?>

<?php if (!isset($user)) {
    header("Location: login.php");
}*/
$n=1;
?>

<?php

session_start();
$mysqli = require __DIR__ . "/database.php";
if (isset($_SESSION["user_id"])) {
    
    $n=0;
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}

?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql2 = "SELECT * FROM posts where id_user={$id}";

    $result2 = mysqli_query($mysqli, $sql2);

    $sql = "SELECT * FROM users
            WHERE id = {$id}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    

    

    

    //fetch user posts and put it in array $myposts (if it is my profile: put my posts, if it is another user profile: put his posts)

    //example just for test
}else if((isset($user))){
    $sql2 = "SELECT * FROM posts where id_user={$user["id"]}";

    $result2 = mysqli_query($mysqli, $sql2);
}else{
    header("Location: login.php");
}

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/profile.css">
        <link rel="stylesheet" href="./styles/styles.css">
        <link rel="stylesheet" href="./styles/wave.css">
        <script src="./scripts/validation_profile.js" defer></script>
        <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>

        <title>Profile</title>
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
        <?php if ($n==0) : ?>
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

        <?php if (isset($_GET["id"])) : ?>
            <h1>Profil d'artiste</h1>
            <div class="ligne1"></div>
            <div class="ligne2"></div>
            <div class="profileContainer">
                <div class="lineDecoration"></div>
                <?php
                if (isset($user["photo"])) {
                    if ($user["photo"]) {
                        $img = "./uploads/" . $user["photo"];
                    } else {
                        $img = "./images/utilisateur1.jpeg";
                    }
                } else {
                    $img = "./images/utilisateur1.jpeg";
                }
                echo "<img class='imgUser' src='" . $img . "' alt='profile'>";
                ?>
                <h2><?= $user["prenom"] . " " . $user["nom"] ?></h2>
                <h6><?= $user["email"] ?></h6>
                <h4>posts:</h4>
                <?php
                while ($myposts = $result2->fetch_assoc()) {
                    echo "<h5><a href='./posts.php?id=" . $myposts["id_post"] . "'>" . $myposts["nom_post"] . "</a></h5>"; // change it to $post["id"] and $post["nom"] if it is an array and not an object (i am not sure of the return type)
                }
                ?>
            </div>
        <?php else : ?>
            <h1>Mon profil</h1>
            <div class="ligne1"></div>
            <div class="ligne2"></div>
            <div class="profileContainer">
                <div class="lineDecoration"></div>
                <?php
                if (isset($user["photo"])) {
                    if ($user["photo"]) {
                        $img = "./uploads/" . $user["photo"];
                    } else {
                        $img = "./images/utilisateur1.jpeg";
                    }
                } else {
                    $img = "./images/utilisateur1.jpeg";
                }
                echo "<img class='imgUser' src='" . $img . "' alt='profile'>";
                ?>
                <h2><?= $user["prenom"] . " " . $user["nom"] ?></h2>
                <h6><?= $user["email"] ?></h6>
                <h4>posts:</h4>
                <?php
                //check if there he has no post echo pas encore de postes..
                while ($myposts = $result2->fetch_assoc()) {
                    echo "<h5><a href='./posts.php?id=" . $myposts["id_post"] . "'>" . $myposts["nom_post"] . "</a></h5>"; // change it to $post["id"] and $post["nom"] if it is an array and not an object (i am not sure of the return type)
                }
                ?>
            </div>
        <?php endif; ?>
        <?php if (!isset($_GET["id"])) : ?>
            <div class="profileContainer">
                <img class="imgUser" style="border: none; border-radius: 0;" src="./images/footericon2.png" alt="modifier">
                <h2>changer vos cordonnées</h2>
                <form action="upload_profile.php" method="POST" enctype="multipart/form-data" id="update_form">
                    <div class="formGrid">
                        <div>
                            <label for="nom">Nouveau nom: </label>
                        </div>
                        <div>
                            <input type="text" name="nom" id="nom">
                        </div>
                        <div style="text-align: center;"><span id="erreur_nom"></span></div>
                        <div>
                            <label for="prenom">Nouveau prenom: </label>
                        </div>
                        <div>
                            <input type="text" name="prenom" id="prenom">
                        </div>
                        <div style="text-align: center;"><span id="erreur_prenom"></span></div>
                        <div>
                            <label for="email">Nouveau email: </label>
                        </div>
                        <div>
                            <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="photo">photo: </label>
                        </div>
                        <div>
                            <input type="file" name="photo" id="photo">
                        </div>
                        <div style="text-align: center;"><span id="erreur_photo"></span></div>

                    </div>
                    <div class="btnContainer">
                        <button type="submit" name="submit">Confirmer</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
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
