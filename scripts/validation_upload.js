let myform = document.getElementById('up_form');

myform.addEventListener('submit',function(e){
    let nom_p = document.getElementById('nom_p');
    let des = document.getElementById('des');
    let img = document.getElementById('img');
    if (nom_p.value==""){
        let erreur_nom = document.getElementById('erreur_nom');
        erreur_nom.innerHTML = "le chapms nom poste est obligatoire.";
        erreur_nom.style.color = 'red';
        e.preventDefault();
    }
    if (des.value==""){
        let erreur_des = document.getElementById('erreur_des');
        erreur_des.innerHTML = "le chapms description est obligatoire.";
        erreur_des.style.color = 'red';
        e.preventDefault();
    }else if(des.value.length < 10){
        let erreur_des = document.getElementById('erreur_des');
        erreur_des.innerHTML = "le chapms description doit contenir plus de 15 caractéres.";
        erreur_des.style.color = 'red';
        e.preventDefault();
    }
    if(img.value==""){
        let erreur_img = document.getElementById('erreur_img');
        erreur_img.innerHTML = "le chapms image est obligatoire.";
        erreur_img.style.color = 'red';
        e.preventDefault();
    }

})