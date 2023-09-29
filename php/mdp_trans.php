<?php
//hachage des mots de passe de la base de données gsb_frais dans la table visiteur
// Connexion à la base de données
require("connect_bd.php");

// Préparation de la requête SQL
$req = "SELECT ID_Utilisateur, MDP FROM utilisateurs";

$res = $connexion->query($req);
// Exécution de la requête SQL
if ($res) {
    while ($ligne = $res->fetch()) {
        $mdp_hache = password_hash($ligne['mdp'], PASSWORD_DEFAULT);
        $req2 = "UPDATE utilisateurs SET MDP = '$mdp_hache' WHERE ID_Utilisateur = '$ligne[ID_Utilisateur]'";
        $res2 = $connexion->query($req2);
    }
} else {
    echo "Erreur : " . $req;
}
