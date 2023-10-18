<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Ces trois balises link importent des feuilles de style CSS depuis des fichiers externes. -->
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/style_loader.css">
    <title>Connexion</title>
    <!-- La balise title définit le titre de la page affiché dans l'onglet du navigateur. -->
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
<!-- Cette partie du code PHP vérifie des sessions et redirige l'utilisateur vers d'autres pages en fonction de certaines conditions. -->
<a href="accueil.php">Accueil</a>
<!-- Un lien vers une page nommée "Accueil". -->
<section id="formulaire_de_co">
    <form action="php/verif_connexion.php" method="post">
        <!-- Ceci est un formulaire HTML avec une action qui pointe vers "verif_connexion.php" et une méthode POST. -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Courriel</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <!-- Deux champs de formulaire pour l'adresse email et le mot de passe. -->
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
        </div>
        <div id="error_login"></div>
        <!-- Un conteneur pour afficher des messages d'erreur. -->
        <button type="submit" class="btn">Se connecter</button>
        <!-- Un bouton pour soumettre le formulaire. -->
        <a href="inscription.php">Pas de compte ? Inscrivez-vous !</a>
        <!-- Un lien pour rediriger vers la page d'inscription. -->
    </form>
</section>

<script>
    //Fonction app lors d'une erreur de connexion
    const urlParams = new URLSearchParams(window.location.search);
    const data = urlParams.get('data');
    if (data === "activate_logger") {
        madiv = document.getElementById("error_login");
        madiv.innerHTML = "Login ou mot de passe incorrect ! ";
    }
</script>
<!-- Un script JavaScript pour gérer l'affichage d'erreurs de connexion. -->
<script src="js/loader.js"></script>
<!-- Un lien vers un fichier JavaScript externe appelé "loader.js". -->
<?php
include 'includes/loader.html';
?>
<!-- Cette ligne inclut du contenu HTML depuis un fichier nommé "loader.html". -->
</html>
