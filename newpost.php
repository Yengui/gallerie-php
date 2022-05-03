<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="./scripts/validation_upload.js" defer></script>
       <title>Document</title>
</head>

<body>

       <form action="upload.php" method="POST" enctype="multipart/form-data" id="up_form">
              <div>
                     <input type="text" placeholder="nom du poste" name="nom_p" id="nom_p" />
              </div>
              <span id="erreur_nom"></span>
              <div>
                     <input type="text" placeholder="description" name="des" id="des" />
              </div>
              <span id="erreur_des"></span>
              <div>
                     <input type="file" name="image" id="img">
              </div>
              <span id="erreur_img"></span>
              <div>
                     <input type="submit" name="submit" value="Upload">
              </div>
       </form>

</body>

</html>