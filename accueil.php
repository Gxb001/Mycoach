<!DOCTYPE html>
<html lang="en">
<!--HEAD-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sytle_accueil.css">
    <title>MyCoach</title>
</head>
<?php
include 'php/connect_bd.php';
session_start();
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header("Location: accueil.php");
    exit();
}
?>
<body>
<section class="container-fluid">
    <!--NAVBAR-->
    <?php
    include 'includes/navbar.php';
    ?>
    <!--CAROUSEL-->
    <?php
    include "includes/carousel.html";
    ?>
    <!--Seances-->
    <section id="seances" class="bg-dark mt-1 pb-5"
    < class="container-lg">
            <div class="text-center">
                <h2 class="text-muted">Nos Séances</h2>
                <p class="lead text-muted">Les entrainements proposés sont triées par niveau :</p>
                <p class="text-bg-info">Débutant</p>
                <p class="text-bg-warning">Intermédiaire</p>
                <p class="text-bg-light">Expert</p>
            </div>
            <?php
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
</div>
';
            } else {
                $req_seanceSp = "SELECT Nom_seance, Date, Horaire, Niveau, Description FROM seances WHERE Date >= CURDATE();";
                $result_seanceSp = $connexion->query($req_seanceSp);
                $niveau = array(
                    "Debutant" => "text-bg-info",
                    "Intermediaire" => "text-bg-warning",
                    "Expert" => "text-bg-light"
                );
                while ($ligne_seanceSp = $result_seanceSp->fetch()) {
                    echo '<div class="row my-5 align-items-center justify-content-center" >
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
include 'includes/coach.html';
?>
<!--MODAL Contact-->
<?php
include 'includes/modal_contact.html'
?>
<!--footer-->
<?php
include 'includes/footer.html';
?>
<script src="js/bootstrap.js"></script>
</body>
</html>