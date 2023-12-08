<?php
session_start();
$connected = isset($_SESSION['pseudo']);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-2" href="">
            <img
                    src="../Ressources/logo.jpg"
                    height="50"
                    alt=""
                    loading="lazy"
                    style="margin-top: -1px;"
            />
        </a>

        <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#navbarButtonsExample"
                aria-controls="navbarButtonsExample"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarButtonsExample">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/presta.php">Nos Prestations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/produit.php"">Nos Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/real.php"">Nos Realisations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/contact.php">Contact</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <?php if ($_SESSION['pseudo'] == 'admin') {?>
                    <a href="admin.php" class="btn btn-dark me-3">Espace Admin</a>
                    <a href="deconnexion.php?action=deconnexion" class="btn btn-danger me-3">Déconnexion</a>
                <?php } else if ($connected){ ?>
                    <a href="" class="btn btn-secondary me-3">Commander</a>
                    <a href="deconnexion.php?action=deconnexion" class="btn btn-danger me-3">Déconnexion</a>
                <?php } else { ?>
                    <button onclick="window.location.href = 'login.php';" type="button" class="btn btn-primary me-3">Connexion</button>
                    <button onclick="window.location.href = 'register.php';" type="button" class="btn btn-primary me-3">Enregistrement</button>
                <?php } ?>
            </div>
</nav>

<style>
    .btn-primary {
        --bs-btn-bg: #c1ab94;
        --bs-btn-border-color: #c1ab94;
    }

    .btn:hover {
        color: var(--bs-btn-hover-color);
        background-color: #c2986c;
        border-color: #c2986c;
    }

    .custom-button {
        font-size: 16px;
        margin: 0;
    }

</style>