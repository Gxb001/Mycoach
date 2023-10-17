<!DOCTYPE html>
<html lang="en">
<!--HEAD (En-tête du document)-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style_accueil.css">
    <link rel="stylesheet" href="css/style_loader.css">
    <title>MyCoach</title>
</head>
<?php
// Inclusion du fichier de connexion à la base de données
include 'php/connect_bd.php';
// Démarrage de la session
session_start();
// Vérification de l'activité de la session et déconnexion si inactive
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: accueil.php");
    exit();
}
?>
<body>
<section class="container-fluid">
    <!--NAVBAR (Barre de navigation)-->
    <?php
    // Inclusion de la barre de navigation depuis un fichier externe
    include 'includes/navbar.php';
    ?>
    <!--CAROUSEL (Diaporama)-->
    <?php
    // Inclusion du diaporama depuis un fichier externe
    include "includes/carousel.html";
    ?>
    <!--Seances (Séances d'entraînement)-->
    <section id="seances" class="bg-dark mt-1 pb-5">
        <div class="container-lg">
            <div class="text-center">
                <h2 class="text-muted">Nos Séances</h2>
                <p class="lead text-muted">Les entraînements proposés sont triés par niveau :</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 col-lg-3 text-center">
                    <div class="level-card text-bg-info">
                        <p class="level-title">Débutant</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 text-center">
                    <div class="level-card text-bg-warning">
                        <p class="level-title">Intermédiaire</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 text-center">
                    <div class="level-card text-bg-light">
                        <p class="level-title">Expert</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        // Vérification de la session utilisateur
        if (!isset($_SESSION['ok'])) {
            echo '<div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Connectez-vous pour voir les séances
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Vous êtes actuellement déconnecté. Devenez membre pour avoir accès à nos séances.</p>
                                    <a href="login.php" class="btn btn-secondary">Se connecter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        } else {
            // Requête pour récupérer les séances à venir
            $req_seanceSp = "SELECT Nom_seance, Date, Horaire, Niveau, Description FROM seances WHERE Date >= CURDATE();";
            $result_seanceSp = $connexion->query($req_seanceSp);
            // Tableau associatif pour définir les classes de niveau
            $niveau = array(
                "Debutant" => "text-bg-info",
                "Intermediaire" => "text-bg-warning",
                "Expert" => "text-bg-light"
            );
            // Affichage des séances
            while ($ligne_seanceSp = $result_seanceSp->fetch()) {
                echo '<div class="row my-5 align-items-center justify-content-center">
                        <div class="col-8 col-lg-4 col-xl-3 text">
                            <div class="card shadow-one border-0 ' . $niveau[$ligne_seanceSp["Niveau"]] . ' ">
                                <div class="card-body text-center py-4">
                                    <h4 class="card-title">' . $ligne_seanceSp["Nom_seance"] . '</h4>
                                    <p class="lead card-subtitle">' . $ligne_seanceSp["Date"] . ' à ' . $ligne_seanceSp["Horaire"] . '</p>
                                    <p class="card-text mx-5 d-none d-lg-block mt-3">' . $ligne_seanceSp["Description"] . '</p>
                                    <a class="btn btn-outline-primary btn-lg mt-3">Participer</a>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            $result_seanceSp->closeCursor();
        }
        ?>
    </section>
    <!--Coach-->
    <?php
    // Inclusion des informations sur le coach depuis un fichier externe
    include 'includes/coach.html';
    ?>
    <!--MODAL Contact (Fenêtre modale de contact)-->
    <?php
    // Inclusion de la fenêtre modale de contact depuis un fichier externe
    include 'includes/modal_contact.html'
    ?>
    <!--footer (Pied de page)-->
    <?php
    // Inclusion du pied de page depuis un fichier externe
    include 'includes/footer.html';
    ?>
</section>
<div id="welcomeModal" class="modal-welcome">
    <div class="modal-content-welcome">
        <span class="close-welcome" onclick="closeModal()">&times;</span>
        <p>Bienvenue, <?php echo $_SESSION['login']; ?></p>
    </div>
</div>
<script src="js/bootstrap.js"></script>
<script>
    // Sélectionnez le bouton par son ID
    var reloadpage = document.getElementById('reloadpage');

    // Ajoutez un écouteur d'événements "click" sur le bouton
    reloadpage.addEventListener('click', function () {
        // Utilisez la méthode location.reload() pour recharger la page
        location.reload();
    });
</script>
<script>
    // JavaScript pour afficher la fenêtre modale
    var isLoggedIn = <?php echo isset($_SESSION['ok']) ? 'true' : 'false'; ?>;

    if (isLoggedIn) {
        var modal = document.getElementById('welcomeModal');
        modal.style.display = 'block';
    }

    // JavaScript pour fermer la fenêtre modale
    function closeModal() {
        var modal = document.getElementById('welcomeModal');
        modal.style.display = 'none';
    }

    setTimeout(function () {
        closeModal();
    }, 3000);
</script>
</body>
<script src="js/loader.js"></script>
<?php
include 'includes/loader.html';
?>
</html>
