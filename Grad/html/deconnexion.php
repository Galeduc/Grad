<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
    unset($_SESSION['pseudo']);
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
