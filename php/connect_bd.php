<?php
// Déclaration de la variable $db pour la connexion
$db = null;

$hote = "localhost";
$login = "root";
$mdp = "";
$nombd = "mycoach";

// Connection au serveur
try {
    $connexion = new  PDO ("mysql:host=$hote;dbname=$nombd", $login, $mdp);
} catch (Exception $e) {  // Si erreur, afficher le message d'erreur
    die("Erreur : " . $e->getMessage());
}

// Affichage de la connexion
//echo $connexion->getAttribute(PDO::ATTR_CONNECTION_STATUS);
?>
