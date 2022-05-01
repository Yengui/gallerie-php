<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: profile.php");
            exit;
        }
    }
    
    $is_invalid = true;
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
    <title>Login</title>
</head>

<body>
    <div class="navbarcontainer">
        <div class="logo">Ma <span>Gallerie</span></div>
        <div class="navbar1">
            <div class="nav-btn"><a href="./">accueil</a></div>
            <div class="nav-btn"><a href="./designs.php">designs</a></div>
            <div class="nav-btn"><a href="#meilleurs">meilleurs</a></div>
            <div class="nav-btn"><a href="#about">à propos</a></div>
        </div>
        <div class="navbar2">
            <div class="connecter">se connecter</div>
            <div class="inscription">s'inscrire</div>
        </div>
    </div>

    <section class="loginsection">
        <form  method="POST" id="form1">
            <div class="img">
                <img src="./images/loginvector.png" width="231px" height="176px" alt="login">
            </div>
            <div>
                <h3>Se connecter!</h3>
            </div>
            <?php if ($is_invalid): ?>
             <em>Invalid login</em>
             <?php endif; ?>
            <div>
                <input type="email" placeholder="email" name="email" id="email" required />
            </div>
            
            <div>
                <input type="password" placeholder="mot de passe" name="password" id="password" required />
            </div>
           
            <div>
                <button type="submit">Se connecter</button>
            </div>
        </form>
    </section>

    <section class="footer">
        <div class="custom-shape-divider-top-1650420830">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="flexfooter">
            <div>
                <h1>Ma <span>Gallerie</span></h1>
            </div>
            <div>
                <img src="" alt="facebook">
                <img src="" alt="instagram">
                <img src="" alt="watsapp">
            </div>
            <div class="contactinfo">
                <div><img src="" alt="phone"> +216 22 222 222</div>
                <div><img src="" alt="email"> email@email.com</div>
            </div>
        </div>
    </section>
</body>

</html>

<?php

?>