<?php
//check if user is logged in, if not redirect him to index
//+ connect navbar and footer (in all pages)
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
</body>

</html>