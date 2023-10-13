<?php
include("connect_bd.php");
include ("functions.php");

$name= $_POST['nom'];
$firstname= $_POST['prenom'];
$sexe= $_POST['sexe'];
$mdp= $_POST['mdp'];
$email= $_POST['email'];
$verif = array($name, $firstname);

for ($i = 0; $i < count($verif); $i++) {
    if (inputspecial($verif[$i])) {
        $data = "activate_signuperrspecial";
        $url = "../inscription.php?data=" . urlencode($data);
        header("Location: " . $url);
    }
}


/*signup une fois inscrit*/
if (check_email($email) && check_mdp($mdp) && !check_email_bd($connexion, $email) && passwordForm($mdp)) {
    $mdp_crypte = password_hash($mdp, PASSWORD_DEFAULT);
    signup($connexion, $name, $firstname, $sexe, $mdp_crypte, $email);
}
else{
    if (!check_email($email)){
        $data = "activate_signuperrmail";
        $url = "../inscription.php?data=" . urlencode($data);
        header("Location: " . $url);
    } else if (!check_mdp($mdp)) {
        $data = "activate_signuperrmdp";
        $url = "../inscription.php?data=" . urlencode($data);
        header("Location: " . $url);
    } else if (check_email_bd($connexion, $email)) {
        $data = "activate_signuperr";
        $url = "../inscription.php?data=" . urlencode($data);
        header("Location: " . $url);
    } else if (!passwordForm($mdp)) {
        $data = "activate_signuperrmdpform";
        $url = "../inscription.php?data=" . urlencode($data);
        header("Location: " . $url);
    }

}
