<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Nos Prestations</title>
  <script src="https://kit.fontawesome.com/59fa4e08aa.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="/js/script.js"></script>
</head>
<body>
<?php include 'nav.php'?>



<div class="content-container">
    <section id="img">
        <span>Nos Préstations</span>
    </section>
</div>
<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-6">
        <h2 class="featurette-heading fw-normal lh-1 text-center m-5">Les Escaliers</h2>
        <p class="lead">Véritable lieu de passage, l’escalier grad a été pensé pour vous
            simplifier la vie. À lui seul, il satisfait toutes les attentes que vous
            pourriez avoir : robustesse, stabilité et élégance. Sa surface rainurée
            lui confère une adhérence à toute épreuve.
            Adaptable en longueur et en largeur, il vous offrira un confort de
            déplacement très appréciable au quotidien.  </p>
    </div>
    <div class="col-md-6">
        <img src=../Ressources/prestations/escalier-GC.jpg
             class="" style="height: 400px; width: 900px;">
    </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-6 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1 text-center m-5">Les Planchers</h2>
        <p class="lead">À la pointe de la technologie en matière de préservation du bois,
            les planchers grad ont été pensés pour satisfaire vos envies.
            Dotés d’un système de pose breveté, d’une fixation invisible
            et démontable, ils s’adaptent aux particularités de votre terrasse.
            Issus de forêts bien gérées, nos matériaux sont sélectionnés pour
            vous garantir des terrasses de qualité : imputrescibles, stables
            et pérennes. </p>
    </div>
    <div class="col-md-6 order-md-1">
        <img src=../Ressources/prestations/terrasse.jpg
             class="" style="height: 400px; width: 900px;">
    </div>
</div>

<hr class="featurette-divider">
<?php include 'footer.php'?>
</body>
</html>

<style>

    .row {
        --bs-gutter-x: 0rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-.5 * var(--bs-gutter-x));
        margin-left: calc(-.5 * var(--bs-gutter-x));
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
</style>
