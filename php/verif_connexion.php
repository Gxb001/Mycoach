<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connectez-vous</title>
<!--    <script>
        function logerr(){
            var madiv = document.getElementById("erreur");
            madiv.innerHTML = "Login ou mot de passe incorrect";
        }
    </script>-->
</head>
<body>
<?php
	include("PHP/connect_bd.php");
	$login = $_POST['login'];
	$mdp = $_POST['mdp'];

	$sql = "SELECT * FROM utilisateurs WHERE Email = '$login'";
	$result = $connexion->query($sql);
	$ligne = $result->fetch();
    if ($ligne)
    {
        $motPasseBdd = $ligne['MDP'];

        if(!password_verify($mdp, $motPasseBdd))
        {
            //afficher un message d'erreur

        }
        else if(password_verify($mdp, $motPasseBdd)){
            session_start();
            $_SESSION['ok'] = "oui";
            $_SESSION['ID'] = $ligne['ID_Utilisateur'];
            $_SESSION['login'] = $login;
            // Retour vers la page d'entr�e du site
            header("Location: Visiteurs.php");
            // On quitte le script courant sans effectuer les �ventuelles  instructions qui suivent
            exit;
        }
    }
    else
    {
        //afficher erreur, veuillez vous inscrire
    }
	$result->closeCursor();
	$connexion = null;

?>
</body>
</html>