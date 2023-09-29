<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Connectez-vous</title>
</head>
<body>
<?php
include("connect_bd.php");
$login = $_POST['email'];
$mdp = $_POST['mdp'];

$sql = "SELECT * FROM utilisateurs WHERE Email = '$login'";
$result = $connexion->query($sql);
$ligne = $result->fetch();
if ($ligne) {
    $motPasseBdd = $ligne['MDP'];

    if (!password_verify($mdp, $motPasseBdd)) {
        //affichage erreur de logins

    } else if (password_verify($mdp, $motPasseBdd)) {
        session_start();
        $_SESSION['ok'] = "oui";
        $_SESSION['ID'] = $ligne['ID_Utilisateur'];
        $_SESSION['login'] = $login;
        // Retour vers la page d'entr�e du site
        header("Location: ../accueil.php");
        // On quitte le script courant sans effectuer les �ventuelles  instructions qui suivent
        exit;
    }
} else {
    //affichage erreur de logins
}
$result->closeCursor();
$connexion = null;

?>
</body>
<script src="../js/script.js">
</script>
</html>