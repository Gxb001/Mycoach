<?php
/*verif du format de l'email*/
function check_email($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
/*verifie si l'email est deja utilisé*/
function check_email_bd($connexion, $email){
    $sql = "SELECT * FROM utilisateurs WHERE Email = '$email'";
    $result = $connexion->query($sql);
    $ligne = $result->fetch();
    if ($ligne){
        return true;
    }
    else{
        return false;
    }
}
/*necessite une taille minimum de mdp*/
function check_mdp($mdp){
    if (strlen($mdp) < 8) {
        return false;
    }
    else{
        return true;
    }
}
function signup($connexion, $name, $firstname, $sexe, $mdp_crypte, $email){
    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Sexe, MDP, Email) VALUES ('$name', '$firstname', '$sexe', '$mdp_crypte', '$email')";
    $result = $connexion->exec($sql);
    if ($result) {
        header("Location: ../accueil.php");
        /*afficher un message inscription réussi*/
        exit;
    } else {
        echo "Erreur lors de l'inscription";
        /*verifier les email deja existant*/
    }
}
?>
