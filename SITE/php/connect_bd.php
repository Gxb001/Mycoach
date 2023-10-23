<?php
$db = null;

$hote = "localhost";
$login = "root";
$mdp = "";
$nombd = "mycoach";

//Connection au serveur
try {
    $connexion = new  PDO ("mysql:host=$hote;dbname=$nombd", $login, $mdp);
} catch (Exception $e) {  //afficher le message d'erreur
    die("Erreur : " . $e->getMessage());
}

//Affichage de la connexion
//echo $connexion->getAttribute(PDO::ATTR_CONNECTION_STATUS);
?>
