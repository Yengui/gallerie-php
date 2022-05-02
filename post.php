<?php
$id = $_GET["id"];
//fetch post by id and get $nom $img $description $reaction $reactions
$nom = "nom";
$img = "statsbg.jpeg";
$description = "description description description description description description description description description description description description description description description ";
$reactions = 10;
$reaction = 0; //1 for like, 2 for love, 3 for haha, 0 for no reaction
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/post.css">
    <title><?php $nom ?></title>
</head>

<body>
    <div class="postcontainer">
        <?php
        echo "<img class='postImg' src='./images/" . $img . "' alt='poste'>";
        echo "<h1 class='postNom'>" . $nom . "</h1>";
        echo "<p class='postDescription'>" . $description . "</p>";
        ?>
        <div class="postReactions">
            <?php
            echo "<div class='postReactNbr'>" . $reactions . "</div>";
            if ($reaction == 0) {
                echo "<div class='reaction'>laisser une reaction</div>";
            } else {
                echo "<div class='reaction'><img src='./images/react'" . $reaction . " alt='reaction' /></div>";
            }
            ?>
        </div>
    </div>
</body>

</html>