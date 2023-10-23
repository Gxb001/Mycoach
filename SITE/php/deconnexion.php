<?php
session_start();
if (isset($_SESSION['ok'])) {
    session_unset();
    session_destroy();
    header("Location: ../accueil.php");
} else {
    header("Location: ../accueil.php");
}
exit();
?>