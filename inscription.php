<!--//formulaire d'incription pour un utilisateur contenant : Nom, Prenom, Sexe, mot de passe, email.
//le mot de passe est crypté avec la fonction password_hash() de php
//le sexe est un bouton radio
//le formulaire est envoyé à la page inscription.php
//la page inscription.php contient un tableau qui affiche les données saisies par l'utilisateur-->

<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sytle_inscription.css">
    <title>MyCoach</title>
</head>
<body>
<form action="php/verif_inscription.php">
    <input type="text" name="nom"> Nom <br>
    <input type="text" name="prenom"> Prenom <br>
    <input type="radio" name="sexe" value="homme"> Homme <br>
    <input type="radio" name="sexe" value="femme"> Femme <br>
    <input type="password" name="mdp"> Mot de passe <br>
    <input type="email" name="email"> Email <br>
    <input type="submit" value="Envoyer">
    <div class="activate_signuperr"></div>
</form>

</body>
<script>
    //Fonction appeller lors d'une erreur de connexion
    const urlParams = new URLSearchParams(window.location.search);
    const data = urlParams.get('data');
    if (data === "activate_signuperrmail") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre email n'est pas valide !";
    }
    else if (data ==="activate_signuperrmdp"){
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre mot de passe doit contenir au moins 8 caractères";
    }
    else if (data ==="activate_signuperr"){
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre email n'est pas valide !";
    }
</script>
</html>
