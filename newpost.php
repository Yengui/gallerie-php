<?php

    session_start();

    if (isset($_SESSION["user_id"])) {

        $mysqli = require __DIR__ . "/database.php";

        $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
    }
    if (!isset($user)) {
       header("Location: index.php");
   }


?>


<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <link rel="stylesheet" href="./styles/newpost.css">
       <link rel="stylesheet" href="./styles/profile.css">
       <link rel="stylesheet" href="./styles/styles.css">
       <link rel="stylesheet" href="./styles/wave.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="./scripts/validation_upload.js" defer></script>
       <title>Nouveau poste</title>
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

       <h1>Ajouter un nouveau poste</h1>
       <div class="ligne1"></div>
       <div class="ligne2"></div>

       <div class="profileContainer">
              <img class="imgUser" style="border: none; border-radius: 0;" src="./images/footericon2.png" alt="modifier">
              <h2>Ajouter un nouveau poste</h2>
              <form action="upload.php" method="POST" enctype="multipart/form-data" id="up_form">
                     <div class="formGrid">
                            <div>
                                   <label for="nom_p">Nom du poste: </label>
                            </div>
                            <div>
                                   <input type="text" placeholder="" name="nom_p" id="nom_p" />
                            </div>
                     </div>
                     <div style="text-align: center;"><span id="erreur_nom"></span></div>
                     <div class="formGrid">
                            <div>
                                   <label for="des">Description: </label>
                            </div>
                            <div>
                                   <input type="text" placeholder="" name="des" id="des" />
                            </div>
                     </div>
                     <div style="text-align: center;"><span id="erreur_des"></span></div>
                     <div class="formGrid">
                            <div>
                                   <label for="img">Image: </label>
                            </div>
                            <div>
                                   <input type="file" name="image" id="img" />
                            </div>
                     </div>
                     <div style="text-align: center;"><span id="erreur_img"></span></div>
                     <div class="btnContainer">
                            <input type="submit" id="submitNew" name="submit" value="Télécharger">
                     </div>
              </form>
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