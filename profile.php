<?php

if (isset($_GET["id"])) {
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
}

//fetch user posts and put it in array $myposts (if it is my profile: put my posts, if it is another user profile: put his posts)

//example just for test
$myposts = array(
    (object) [
        'nom' => 'nom 1',
        'id' => '1'
    ],
    (object) [
        'nom' => 'nom 2',
        'id' => '2'
    ],
    (object) [
        'nom' => 'nom 3',
        'id' => '3'
    ]
);
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
    <script src="https://kit.fontawesome.com/460debd51d.js" crossorigin="anonymous"></script>
    <title>Profile</title>
</head>

<body>
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
            foreach ($myposts as $post) {
                echo "<h5><a href='./posts.php?id=" . $post->id . "'>" . $post->nom . "</a></h5>"; // change it to $post["id"] and $post["nom"] if it is an array and not an object (i am not sure of the return type)
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
            foreach ($myposts as $post) {
                echo "<h5><a href='./posts.php?id=" . $post->id . "'>" . $post->nom . "</a></h5>"; // change it to $post["id"] and $post["nom"] if it is an array and not an object (i am not sure of the return type)
            }
            ?>
        </div>
    <?php endif; ?>
    <?php if (!isset($_GET["id"])) : ?>
        <div class="profileContainer">
            <img class="imgUser" style="border: none; border-radius: 0;" src="./images/footericon2.png" alt="modifier">
            <h2>changer vos cordonnées</h2>
            <form action="./profile.php" method="POST">
                <div class="formGrid">
                    <div>
                        <label for="nom">Nouveau nom: </label>
                    </div>
                    <div>
                        <input type="text" name="nom" id="nom">
                    </div>
                    <div>
                        <label for="prenom">Nouveau prenom: </label>
                    </div>
                    <div>
                        <input type="text" name="prenom" id="prenom">
                    </div>
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
                </div>
                <div class="btnContainer">
                    <button type="submit">Confirmer</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</body>

</html>