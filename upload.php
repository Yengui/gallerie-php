<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM users
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
if (!isset($user)){
    header("Location: login.php");
}   

if (isset($_POST['submit'])) {
    $image= $_FILES['image'];
    $img_name = $_FILES['image']['name'];
	$img_size = $_FILES['image']['size'];
	$tmp_name = $_FILES['image']['tmp_name'];
	$error = $_FILES['image']['error'];

    $imageext = explode('.',$img_name);
    $imageactualext = strtolower(end($imageext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($imageactualext, $allowed)){
        if($error === 0){
            if ($img_size < 500000){
                $imagenewname = uniqid('', true).".".$imageactualext;
                $img_upload_path = './uploads/'.$imagenewname;
				move_uploaded_file($tmp_name, $img_upload_path);

                $mysqli = require __DIR__ . "/database.php";
                $sql = "INSERT INTO posts (id_user, nom_post, descrip, nom_photo)
                VALUES (?, ?, ?, ?)";
                $stmt = $mysqli->stmt_init();

                if ( ! $stmt->prepare($sql)) {
                    die("SQL error: " . $mysqli->error);
                }
                
                $stmt->bind_param("dsss",$_SESSION["user_id"], $_POST["nom_p"], $_POST["des"],$imagenewname);
                                  
                if ($stmt->execute()) {
                
                    header("Location: gallerie.php");
                    exit;
                    
                } else {
                    
                    
                    die($mysqli->error . " " . $mysqli->errno);
                    
                }


            }else{
                echo "erreur taille image";
            }

        } else{
            echo "erreur";

        }
    } else {
        die("erreur extension");
    }
}
?>