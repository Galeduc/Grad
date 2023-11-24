<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand me-2" href="https://mdbgo.com/">
            <img
                    src="../Ressources/logo.jpg"
                    height="50"
                    alt=""
                    loading="lazy"
                    style="margin-top: -1px;"
            />
        </a>

        <!-- Toggle button -->
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

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
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
            <!-- Left links -->

            <div class="d-flex align-items-center">
                <button onclick="window.location.href = 'login.php';" type="button" class="btn btn-primary me-3">Connection</button>
                <button onclick="window.location.href = 'register.php';" type="button" class="btn btn-primary me-3">Enregistrement</button>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar -->