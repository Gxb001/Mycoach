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
<div class="container-fluid">
    <section id="barre_de_nav">
        <!--NAVBAR-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand fs-4" href="#hero-carousel">MyCoach</a>
                <button class="navbar-toggler shadow-one border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                     aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header text-white border-bottom">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel" href="#hero-carousel">MyCoach</h5>
                        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                        <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#hero-carousel">Accueil</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link mx-2" href="#seances">Séances</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link mx-2" href="#coach">A propos</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link mx-2" data-bs-toggle="modal" data-bs-target="#reg-modal"
                                   style="cursor: pointer">Contact</a>
                            </li>
                        </ul>
                        <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                            <?php
                            if (isset($_SESSION['ok'])) {
                                echo '<a href="php/deconnexion.php" class="text-white text-decoration-none px-3 py-1 bg-primary rounded-4">Deconnexion</a>';
                            } else {
                                echo '<a href="login.php" class="text-white">Se Connecter</a>';
                                echo '<a href="#signup" class="text-white text-decoration-none px-3 py-1 bg-primary rounded-4">Inscription</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!--carousel-->
    <?php
    include 'includes/carousel.html';
    ?>
    <!--Seances-->
    <section id="seances" class="bg-dark mt-1 pb-5">
        <div class="container-lg">
            <div class="text-center">
                <h2 class="text-muted">Nos Séances</h2>
                <p class="lead text-muted">Les entrainements proposés sont triées par niveau :</p>
                <p class="text-bg-info">Débutant</p>
                <p class="text-bg-warning">Intermédiaire</p>
                <p class="text-bg-light">Expert</p>
            </div>
            <?php
            if (!isset($_SESSION['ok'])) {
                echo '<div class="card mt-5">
  <div class="card-header">
    Connectez-vous pour voir les séances
  </div>
  <div class="card-body">
    <p class="card-text">Vous etes actuellement deconnecté, devenez membre pour avoir acces à nos séances.</p>
    <a href="login.php" class="btn btn-secondary">Se connecter</a>
  </div>
</div>';
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
    <section id="presentation_coach">
        <!--Coach-->
        <div class="row row-cols-1 row-cols-md-2 g-4" id="coach">
            <div class="card-group">
                <div class="card">
                    <img src="medias/coach.jpg" class="card-img-top" alt="photo1">
                    <div class="card-body">
                        <h5 class="card-title">Aurélie</h5>
                        <p class="card-text">Aurélie est une coach sportive passionnée de Pilates. Elle est diplômée
                            d'un
                            diplôme d'état de professeur de Pilates. Elle a une expérience de 7 ans dans l'enseignement
                            du
                            Pilates, et elle est spécialisée dans le Pilates pour tous les âges et pour tous les
                            niveaux.
                            Aurélie est une coach motivante et enthousiaste. Elle s'adapte à chaque personne et à ses
                            objectifs. Elle est toujours à l'écoute de ses clients, et elle les aide à trouver le
                            Pilates
                            qui leur convient.
                            Ces présentations sont simples, mais elles sont efficaces. Elles mettent en avant les points
                            forts de chaque coach, et elles donnent envie aux personnes intéressées de les contacter.
                            Vous pouvez bien sûr personnaliser ces présentations en fonction de vos besoins et de votre
                            salle de sport. Vous pouvez ajouter des informations supplémentaires, comme les diplômes des
                            coachs, leurs expériences, leurs spécialités, ou leurs objectifs. Vous pouvez également
                            ajouter
                            des éléments visuels, comme des photos ou des vidéos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--MODAL Contact-->
    <section id="contacter_le_coach">
        <div class="modal fade" id="reg-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--MODAL HEAD-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Me contacter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--MODAL BODY-->
                    <div class="modal-body">
                        <label for="modal-email" class="form-label">Renseigner votre email :</label>
                        <input type="email" class="form-control" id="modal-email" placeholder="nom.prenom@exemple.com">
                        <div class="form-floating mt-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                  maxlength="300" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Votre message ici.</label>
                        </div>
                    </div>
                    <!--MODAL FOOTER-->
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer-->
    <?php
    include 'includes/footer.html';
    ?>
</body>
</html>