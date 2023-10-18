<?php
include("connect_bd.php");
include("functions.php");
$login = $_POST['email'];
$mdp = $_POST['mdp'];

$sql = "SELECT * FROM utilisateurs WHERE Email = '$login'";
$result = $connexion->query($sql);
$ligne = $result->fetch();
if ($ligne) {
    $motPasseBdd = $ligne['MDP'];
    if (!password_verify($mdp, $motPasseBdd)) {
        $data = "activate_logger";
        $url = "../login.php?data=" . urlencode($data);
        header("Location: " . $url); // Redirection vers la page cible
    } else if (password_verify($mdp, $motPasseBdd)) {
        session_start();
        $_SESSION['ok'] = "oui";
        $_SESSION['login'] = namebyemail($connexion, $login);
        // Retour vers la page d'entree du site
        header("Location: ../accueil.php");
        // On quitte le script courant
        exit;
    }
} else {
    $data = "activate_logger";
    $url = "../login.php?data=" . urlencode($data);
    header("Location: " . $url); // Redirection vers la page cible
}
$result->closeCursor();
$connexion = null;
?>
