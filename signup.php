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

<?php if (isset($user)) {
    header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/auth.css">
    <link rel="stylesheet" href="./styles/wave.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>
    <script src="./scripts/validation_signup.js" defer></script>
    <title>S'inscrire</title>
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
        <div class="navbar2">
            <a href="./login.php">
                <div class="connecter">se connecter</div>
            </a>
            <a href="./signup.php">
                <div class="inscription">s'inscrire</div>
            </a>
        </div>
    </div>

    <section class="signupsection">
        <form action="process-signup.php" method="POST" id="form2" novalidate>
            <div class="img2">
                <img src="./images/signupvector.png" width="190px" height="223px" alt="login">
            </div>
            <div>
                <h3>S'inscrire!</h3>
            </div>
            <div>
                <input type="text" placeholder="prénom" name="prenom" id="prenom" required />
            </div>
            <div>
                <input type="text" placeholder="nom" name="nom" id="nom" required />
            </div>
            <div>
                <input type="email" placeholder="email" name="email" id="email" required />
            </div>
            <div>
                <input type="password" placeholder="mot de passe" name="password" id="password" required />
            </div>
            <div>
                <input type="password" placeholder="confirmer le mot de passe" name="password2" id="password2" required />
            </div>
            <div>
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </section>

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
</body>

</html>