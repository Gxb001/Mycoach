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