const validation = new JustValidate("#form2");
validation
.addField("#prenom", [
    {
        rule: "required",
        errorMessage: 'le prenom est obligatoire',
    },
])
  .addField('#nom', [
    {
      rule: 'required',
      errorMessage: 'le nom est obligatoire',
  
    },
  ])
  .addField("#email", [
    {
        rule: "required",
        errorMessage: 'email est obligatoire'
    },
    {
        rule: "email",
        errorMessage: 'veuillez saisir une adresse email valide'
    },
    {
        validator: (value) => () => {
            return fetch("validate-email.php?email=" + encodeURIComponent(value))
                   .then(function(response) {
                       return response.json();
                   })
                   .then(function(json) {
                       return json.available;
                   });
        },
        errorMessage: "email déjà pris"
    }
])
.addField("#password", [
    {
        rule: "required",
        errorMessage: 'mot de passe est obligatoire'
    },
    {
        rule: "password",
        errorMessage: 'le mot de passe doit comporter au moins 8 caractères et au moins un chiffre et une lettre'
    }
])
.addField("#password2", [
    {
        validator: (value, fields) => {
            return value === fields["#password"].elem.value;
        },
        errorMessage: "Les mots de passe doivent correspondre"
    }
])
  .onSuccess((event) => {
    document.getElementById("form2").submit();
});