<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

}

?>
<?php
$mysqli = require __DIR__ . "/database.php";

$id = $_GET["id"];
//fetch post by id and get $nom $img $description $reaction $reactions $reactionsLike $reactionsLove $reactionsHaha $nomUser $imgUser $idUser
$sql111 = "SELECT * FROM posts
            WHERE id_post = {$id}";
$result111 = $mysqli->query($sql111);
$us = $result111->fetch_assoc();
$idUser=$us["id_user"];
$sql222 = "SELECT * FROM users
            WHERE id = {$idUser}";
$result222 = $mysqli->query($sql222);
$us2= $result222->fetch_assoc();


$nomUserr=$us2["prenom"]." ".$us2["nom"];
$imgUser=$us2["photo"];
$idUserr=$us2["id"];


$sql3 = "SELECT * FROM posts
            WHERE id_post = {$id}";
$result3 = $mysqli->query($sql3);
    
$post = $result3->fetch_assoc();

$sql4 = "SELECT * FROM reactions
            WHERE id_post = {$id}";
$result4 = $mysqli->query($sql4);
    
$nb_row = $result4->num_rows;

$sql5 = "SELECT * FROM reactions
            WHERE id_post = {$id} and reaction=1";
$result5 = $mysqli->query($sql5);
    
$nb_row2 = $result5->num_rows;

$sql6 = "SELECT * FROM reactions
            WHERE id_post = {$id} and reaction=2";
$result6 = $mysqli->query($sql6);
    
$nb_row3 = $result6->num_rows;


$sql7 = "SELECT * FROM reactions
            WHERE id_post = {$id} and reaction=3";
$result7 = $mysqli->query($sql7);
    
$nb_row4 = $result7->num_rows;


if (isset($_SESSION["user_id"])) {
$sql8 = "SELECT * FROM reactions
            WHERE id_post = {$id} and id_user={$user["id"]}";
$result8 = $mysqli->query($sql8);
}
    
if (isset($_SESSION["user_id"])) {
$nb_row5 = $result8->num_rows;
if($nb_row5==0){
    $rea=false;
}else{
    
    $react = $result8->fetch_assoc();
    $rea=$react["reaction"];
}
}

//example values
$nom = $post["nom_post"];
$img = $post["nom_photo"];
$description = $post["descrip"];
$reactions = $nb_row;
$reactionsLike = $nb_row2;
$reactionsLove = $nb_row3;
$reactionsHaha = $nb_row4;
if (isset($_SESSION["user_id"])) {
$reaction = $rea; //1 for like, 2 for love, 3 for haha, false for no reaction (it returns false if it finds no line in the db)
}
if (isset($_SESSION["user_id"])) {
$idUser = $user["id"];
}
if (isset($_SESSION["user_id"])) {
$nomUser = $user["prenom"].$user["nom"];
}

//take reaction code from $_GET["reaction"] (first check if it is isset($_GET["reaction"])) and change the reaction, if the reaction value is 1 or 2 or 3 set it, if it is 0 delete reaction from table
if (isset($_GET["reaction"])){
    $reactio = $_GET["reaction"];
    if($reactio==0){
        echo $id;
        echo $user["id"];
        $sql10 = "DELETE FROM reactions
            WHERE id_post = {$id} and id_user={$user["id"]}";
        $result10 = $mysqli->query($sql10);
        $reaction = false;
        header("Location: post.php?id={$id}");
    }else if($reactio>0){
        if($rea!=false){
        $reaction=$reactio;
        $sql11 = "UPDATE reactions SET reaction=$reactio
            WHERE id_post = {$id} and id_user={$user["id"]}";
        $result11 = $mysqli->query($sql11);
        header("Location: post.php?id={$id}");
        }else{
            $reactio = $_GET["reaction"];
            $reaction=$reactio;
            $sql12 = "INSERT INTO reactions (id_post, id_user, reaction)
            VALUES ({$id}, {$user["id"]}, {$reaction})";
            $result12 = $mysqli->query($sql12);   
            header("Location: post.php?id={$id}");
        
        }
    }
}


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
    
    <h1>Consulter la pièce d'art</h1>
    <div class="ligne1"></div>
    <div class="ligne2"></div>
    <div class="postcontainer">
        <?php
        echo "<div class='imgPostContainer'><div class='imgBg'></div><img class='postImg' src='./uploads/" . $img . "' alt='poste'></div>";
        echo "<h1 class='postNom' id='post'>" . $nom . "</h1>";
        echo "<p class='postDescription'>" . $description . "</p>";
        ?>
        <div class="postReactions">
            <?php
            if (isset($_SESSION["user_id"])) {
            echo "<div class='postReactNbr'>" . $reactions . " réactions</div>";
            }
            echo "<div class='reactNbrSection'>";
            echo "<div><img src='./images/like.png' alt='jaime' />" . $reactionsLike . "</div>";
            echo "<div><img src='./images/love.png' alt='jadore' />" . $reactionsLove . "</div>";
            echo "<div><img src='./images/haha.png' alt='hahareact' />" . $reactionsHaha . "</div>";
            echo "</div>";
            echo "<form method='GET' action='./post.php#post'>";
            echo "<input type='hidden' name='id' value='" . $id . "'  />";
            if (isset($_SESSION["user_id"])) {
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
            }
            echo "</form>";
            ?>
        </div>
        <div class="postUser">
            <?php echo "<img src='./uploads/" . $imgUser . "' alt='utilisateur'>";?>
            <div class="nomUtilisateur">

                <?php  echo "<a href='./profile.php?id=" . $idUserr . "'><h4>" . $nomUserr . "</h4></a>";  ?>
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