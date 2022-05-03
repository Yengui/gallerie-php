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
if (isset($_POST['submit'])) {

    $image= $_FILES['photo'];
    $img_name = $_FILES['photo']['name'];
	$img_size = $_FILES['photo']['size'];
	$tmp_name = $_FILES['photo']['tmp_name'];
	$error = $_FILES['photo']['error'];

    $imageext = explode('.',$img_name);
    $imageactualext = strtolower(end($imageext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($imageactualext, $allowed)){
        if($error === 0){
            if ($img_size < 500000){
                $imagenewname = uniqid('', true).".".$imageactualext;
                $img_upload_path = './uploads/'.$imagenewname;
				move_uploaded_file($tmp_name, $img_upload_path);
               
                $idd=$user["id"];
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $emaill=$_POST["email"];


               // $sql2 = "UPDATE users SET prenom={$_POST["prenom"]}, nom={$_POST["nom"]}, photo=$imagenewname WHERE id ={$user["id"]}";
               // $result2 = $mysqli->query($sql2);

               $query = "UPDATE users SET photo ='$imagenewname', nom='$nom', prenom='$prenom', email='$emaill' WHERE id ='$idd'";
               $result3 = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));

               if($result3){
                header("Location: profile.php");
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