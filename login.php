<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style_login.css">
    <title>Connexion</title>
</head>
<?php
include 'php/connect_bd.php';
session_start();
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: accueil.php");
    exit();
}
if (isset($_SESSION['ok'])) {
    header("Location: accueil.php");
    exit();
}
?>
<a href="accueil.php">Accueil</a>
<section id="formulaire_de_co">
    <form action="php/verif_connexion.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Courriel</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
        </div>
        <div id="error_login"></div>
        <button type="submit" class="btn">Se connecter</button>
        <a href="inscription.php">Pas de compte ? Inscrivez-vous !</a>
    </form>
</section>
<script>
    //Fonction appeller lors d'une erreur de connexion
    const urlParams = new URLSearchParams(window.location.search);
    const data = urlParams.get('data');
    if (data === "activate_logger") {
        madiv = document.getElementById("error_login");
        madiv.innerHTML = "Login ou mot de passe incorrect ! ";
    }
</script>
</html>