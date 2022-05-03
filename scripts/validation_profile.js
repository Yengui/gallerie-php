let upform = document.getElementById("update_form");

upform.addEventListener("submit", function (e) {
    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let photo = document.getElementById("photo");

    let erreur_nom = document.getElementById("erreur_nom");
    let erreur_prenom = document.getElementById("erreur_prenom");
    let erreur_photo = document.getElementById("erreur_photo");
    erreur_nom.innerHTML = "";
    erreur_prenom.innerHTML = "";
    erreur_photo.innerHTML = "";

    if (nom.value == "") {
        erreur_nom.innerHTML = "le chapms nom est obligatoire.";
        erreur_nom.style.color = "red";
        e.preventDefault();
    }
    if (prenom.value == "") {
        erreur_prenom.innerHTML = "le chapms prénom est obligatoire.";
        erreur_prenom.style.color = "red";
        e.preventDefault();
    }
    if (photo.value == "") {
        erreur_photo.innerHTML = "le chapms nom est obligatoire.";
        erreur_photo.style.color = "red";
        e.preventDefault();
    }
    
});

