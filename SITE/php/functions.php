<?php

// Fonction pour vérifier si une adresse email est valide
function check_email($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

// Fonction pour vérifier si une adresse email existe dans la base de données
function check_email_bd($connexion, $email)
{
    $sql = "SELECT * FROM utilisateurs WHERE Email = '$email'";
    $result = $connexion->query($sql);
    $ligne = $result->fetch();
    if ($ligne) {
        return true;
    } else {
        return false;
    }
}

// Fonction pour vérifier si un mot de passe est suffisamment long
function check_mdp($mdp)
{
    if (strlen($mdp) < 8) {
        return false;
    } else {
        return true;
    }
}

// Fonction pour inscrire un nouvel utilisateur dans la base de données
function signup($connexion, $name, $firstname, $sexe, $mdp_crypte, $email)
{
    $sql = "INSERT INTO utilisateurs (Nom, Prenom, Sexe, MDP, Email, Role) VALUES ('$name', '$firstname', '$sexe', '$mdp_crypte', '$email', 'U')";
    $result = $connexion->exec($sql);
    if ($result) {
        session_start();
        $_SESSION['ok'] = "oui";
        $_SESSION['login'] = namebyemail($connexion, $email);
        $_SESSION['logged'] = "true";
        header("Location: ../accueil.php");
        exit;
    }
}

// Fonction pour obtenir le prénom d'un utilisateur en utilisant son adresse email
function namebyemail($connexion, $email)
{
    $sql = "SELECT Prenom FROM utilisateurs WHERE Email = '$email'";
    $result = $connexion->query($sql);
    $ligne = $result->fetch();
    if ($ligne) {
        return $ligne['Prenom'];
    } else {
        return false;
    }
}

// Fonction pour vérifier la complexité d'un mot de passe
function passwordForm($str)
{
    if (preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).*$/', $str)) {
        return true;
    }
    return false;
}

// Fonction pour valider les entrées contre des caractères spéciaux
function validateInputs(array $inputs)
{
    foreach ($inputs as $input) {
        if (preg_match('/[!@#$%^&*()_+{}[\]:;<>,.?~\\\\-]/', $input)) {
            return false;
        }
    }
    return true;
}

?>
