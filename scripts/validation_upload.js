let myform = document.getElementById("up_form");

myform.addEventListener("submit", function (e) {
  let nom_p = document.getElementById("nom_p");
  let des = document.getElementById("des");
  let img = document.getElementById("img");
  let erreur_nom = document.getElementById("erreur_nom");
  let erreur_des = document.getElementById("erreur_des");
  let erreur_img = document.getElementById("erreur_img");
  erreur_nom.innerHTML = "";
  erreur_des.innerHTML = "";
  erreur_img.innerHTML = "";
  if (nom_p.value == "") {
    erreur_nom.innerHTML = "le chapms nom poste est obligatoire.";
    erreur_nom.style.color = "red";
    e.preventDefault();
  }
  if (des.value == "") {
    erreur_des.innerHTML = "le chapms description est obligatoire.";
    erreur_des.style.color = "red";
    e.preventDefault();
  } else if (des.value.length < 10) {
    erreur_des.innerHTML =
      "le chapms description doit contenir plus de 15 caractéres.";
    erreur_des.style.color = "red";
    e.preventDefault();
  }
  if (img.value == "") {
    erreur_img.innerHTML = "le chapms image est obligatoire.";
    erreur_img.style.color = "red";
    e.preventDefault();
  }
});
