<!--//formulaire d'incription pour un utilisateur contenant : Nom, Prenom, Sexe, mot de passe, email.
//le mot de passe est crypté avec la fonction password_hash() de php
//le sexe est un bouton radio
//le formulaire est envoyé à la page verif_inscription.php
//la page inscription.php contient un tableau qui affiche les données saisies par l'utilisateur-->

<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="stylesheet" href="css/style_loader.css">
    <title>MyCoach</title>
</head>
<?php
if (isset($_SESSION['ok'])) {
    header("Location: accueil.php");
    exit();
}
?>
<body>
<a href="accueil.php">Accueil</a>
<form action="php/verif_inscription.php" , method="post">
    <label for="name">Nom</label>
    <input type="text" name="nom" required><br>
    <label for="prenom">Prenom</label>
    <input type="text" name="prenom" required><br>
    <label for="sexe">Sexe</label>
    <input type="radio" name="sexe" value="Homme"> Homme <br>
    <input type="radio" name="sexe" value="Femme"> Femme <br>
    <label for="mdp" required>Mot de passe</label>
    <input type="password" name="mdp"><br>
    <label for="email">Email</label>
    <input type="email" name="email" required><br>
    <input type="submit" value="Envoyer">
    <div id="activate_signuperr"></div>
</form>

</body>
<script>
    //Fonction appeller lors d'une erreur de connexion
    const urlParams = new URLSearchParams(window.location.search);
    const data = urlParams.get('data');
    if (data === "activate_signuperrspecial") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre nom ou prénom contient des caractères spéciaux !";
    } else if (data === "activate_signuperrmdp") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre mot de passe doit contenir au moins 8 caractères !";
    } else if (data === "activate_signuperr") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Cette adresse email est deja utilisée !";
    } else if (data === "activate_signuperrmdpform") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre mot de passe doit contenir au moins une majuscule et un chiffre ainsi qu'un caractère spécial !";
    } else if (data === "activate_signuperrinputs") {
        madiv = document.getElementById("activate_signuperr");
        madiv.innerHTML = "Votre nom ou prénom contient des caractères spéciaux !";
    }

</script>
<script src="js/loader.js"></script>
<?php
include 'includes/loader.html';
?>
</html>
