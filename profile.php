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

<?php if (!isset($user)){
         header("Location: login.php");
     }   
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    profile123
    <?php
    for ($i = 0; $i < 5; $i++) {
        echo "<div>" . "iteration numero " . $i . "</div>";
    };
    echo $_POST["email"];
    echo $_POST["password"];

    //ta7ki m3a BD

    //if ($_POST["email"] != "haha@haha.com") header("Location: ./login.php?erreur=1");
    ?>
</body>

</html>

