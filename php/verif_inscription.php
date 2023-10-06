<?php
include("connect_bd.php");
include ("functions.php");

$name= $_POST['nom'];
$firstname= $_POST['prenom'];
$sexe= $_POST['sexe'];
$mdp= $_POST['mdp'];
$email= $_POST['email'];


/*signup une fois inscrit*/
if (check_email($email) && check_mdp($mdp) && !check_email_bd($connexion, $email)){
    $mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT);
    signup($connexion, $name, $firstname, $sexe, $mdp_crypte, $email);
}
else{
    if (!check_email($email)){
        $data = "activate_signuperrmail";
        $url = "../signup.php?data=" . urlencode($data);
        header("Location: " . $url); // Redirection vers la page cible
    }
    if (!check_mdp($mdp)){
        $data = "activate_signuperrmdp";
        $url = "../signup.php?data=" . urlencode($data);
        header("Location: " . $url); // Redirection vers la page cible
    }
    if (check_email_bd($connexion, $email)){
        $data = "activate_signuperr";
        $url = "../signup.php?data=" . urlencode($data);
        header("Location: " . $url); // Redirection vers la page cible
    }

}
