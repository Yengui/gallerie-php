<?php
$id = $_GET["id"];
//fetch post by id and get $nom $img $description $reaction $reactions $reactionsLike $reactionsLove $reactionsHaha $nomUser $imgUser $idUser


//example values
$nom = "nom";
$img = "statsbg.jpeg";
$description = "description description description description description description description description description description description description description description description ";
$reactions = 10;
$reactionsLike = 5;
$reactionsLove = 3;
$reactionsHaha = 2;
$reaction = false; //1 for like, 2 for love, 3 for haha, false for no reaction (it returns false if it finds no line in the db)
$idUser = 1;
$nomUser = "Ahmad Yengui";
$imgUser = "utilisateur1.jpeg";

//take reaction code from $_GET["reaction"] (first check if it is isset($_GET["reaction"])) and change the reaction, if the reaction value is 1 or 2 or 3 set it, if it is 0 delete reaction from table
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/post.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/wave.css">
    <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>
    <title><?php $nom ?></title>
</head>

<body onload="voirReactions()">
    <div class="navbarcontainer">
        <div class="logo">Ma <span>Gallerie</span></div>
        <div class="navbar1">
            <div class="nav-btn"><a href="./#">accueil</a></div>
            <div class="nav-btn"><a href="./gallerie.php">gallerie</a></div>
            <div class="nav-btn"><a href="./#meilleurs">meilleurs</a></div>
            <div class="nav-btn"><a href="./#temoignages">temoignages</a></div>
        </div>
        <div class="navbar2">
            <a href="./login.php">
                <div class="connecter">se connecter</div>
            </a>
            <a href="./signup.php">
                <div class="inscription">s'inscrire</div>
            </a>
        </div>
    </div>
    <?php
    //if (isset($_GET["id"])) {
    //echo $_GET["id"];
    //}
    ?>
    <?php //if (isset($_GET["reaction"])) {
    //echo $_GET["reaction"];
    //}
    ?>
    <h1>Consulter la pièce d'art</h1>
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    <div class="postcontainer">
        <?php
        echo "<div class='imgPostContainer'><div class='imgBg'></div><img class='postImg' src='./images/" . $img . "' alt='poste'></div>";
        echo "<h1 class='postNom' id='post'>" . $nom . "</h1>";
        echo "<p class='postDescription'>" . $description . "</p>";
        ?>
        <div class="postReactions">
            <?php
            echo "<div class='postReactNbr'>" . $reactions . " réactions</div>";
            echo "<div class='reactNbrSection'>";
            echo "<div><img src='./images/like.png' alt='jaime' />" . $reactionsLike . "</div>";
            echo "<div><img src='./images/love.png' alt='jadore' />" . $reactionsLove . "</div>";
            echo "<div><img src='./images/haha.png' alt='hahareact' />" . $reactionsHaha . "</div>";
            echo "</div>";
            echo "<form method='GET' action='./post.php#post'>";
            echo "<input type='hidden' name='id' value='" . $id . "'  />";
            if (!$reaction) {
                echo "<div id='reaction'>réagir<div id='reactionList'><button type='submit' name='reaction' value='0'><img src='./images/x.png' alt='x' /></button><button type='submit' name='reaction' value='1'><img src='./images/like.png' alt='jaime' /></button><button type='submit' name='reaction' value='2'><img src='./images/love.png' alt='jadore' /></button><button type='submit' name='reaction' value='3'><img src='./images/haha.png' alt='hahareact' /></button></div></div>";
            } else {
                if ($reaction == 1) {
                    echo "<div id='reaction'><img src='./images/like.png' alt='reaction' /><div id='reactionList'><button type='submit' name='reaction' value='0'><img src='./images/x.png' alt='x' /></button><button type='submit' name='reaction' value='1'><img src='./images/like.png' alt='jaime' /></button><button type='submit' name='reaction' value='2'><img src='./images/love.png' alt='jadore' /></button><button type='submit' name='reaction' value='3'><img src='./images/haha.png' alt='hahareact' /></button></div></div>";
                } elseif ($reaction == 2) {
                    echo "<div id='reaction'><img src='./images/love.png' alt='reaction' /><div id='reactionList'><button type='submit' name='reaction' value='0'><img src='./images/x.png' alt='x' /></button><button type='submit' name='reaction' value='1'><img src='./images/like.png' alt='jaime' /></button><button type='submit' name='reaction' value='2'><img src='./images/love.png' alt='jadore' /></button><button type='submit' name='reaction' value='3'><img src='./images/haha.png' alt='hahareact' /></button></div></div>";
                } elseif ($reaction == 3) {
                    echo "<div id='reaction'><img src='./images/haha.png' alt='reaction' /><div id='reactionList'><button type='submit' name='reaction' value='0'><img src='./images/x.png' alt='x' /></button><button type='submit' name='reaction' value='1'><img src='./images/like.png' alt='jaime' /></button><button type='submit' name='reaction' value='2'><img src='./images/love.png' alt='jadore' /></button><button type='submit' name='reaction' value='3'><img src='./images/haha.png' alt='hahareact' /></button></div></div>";
                } else {
                    echo "<div id='reaction'>réagir<div id='reactionList'><button type='submit' name='reaction' value='0'><img src='./images/x.png' alt='x' /></button><button type='submit' name='reaction' value='1'><img src='./images/like.png' alt='jaime' /></button><button type='submit' name='reaction' value='2'><img src='./images/love.png' alt='jadore' /></button><button type='submit' name='reaction' value='3'><img src='./images/haha.png' alt='hahareact' /></button></div></div>";
                }
            }
            echo "</form>";
            ?>
        </div>
        <div class="postUser">
            <?php echo "<img src='./images/" . $imgUser . "' alt='user'>"; ?>
            <div class="nomUtilisateur">
                <?php echo "<a href='./profile.php?id=" . $idUser . "'><h4>" . $nomUser . "</h4></a>"; ?>
            </div>
        </div>
    </div>

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