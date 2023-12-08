<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Nos Produits</title>
    <script src="https://kit.fontawesome.com/59fa4e08aa.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.es.min.js" integrity="sha512-89Ar0ofqIrPG0GKRxVyihfyrZP3wApwUKRU5SxDLyk/o5OF3yVE6zNm30byp89uKsboFNinM2DEHYGOKTEIvPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="/js/script.js"></script>
    <style>
        .center-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
<?php include 'nav.php'; ?>
<div class="container-fluid p-0 position-relative">
    <img src="../Ressources/entete01.jpg" class="img-fluid w-100" alt="Bienvenue chez Grad">
    <div class="center-text text-center text-white">
        <h1 class="display-3">Nos Produits</h1>
    </div>
</div>
</div><hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-6">
        <h2 class="featurette-heading fw-normal lh-1 text-center m-5">Les Escaliers</h2>
        <p class="lead">Grâce au profilage et à la mise en oeuvre particulière de Grad, sa résistance naturelle et sa pérennité sont encore augmentées.
            Le Douglas est raboté après un passage en séchoir ; cette opération alliée à son faible retrait radial lui permet d’être fixé avec le système du clip JuAn®.
            Note :
            - La présence des noeuds confère au Douglas une apparence rustique, d’une couleur miel, proche de celle du Pin à l’état naturel
            - Ce produit bénéficie d’une garantie de 5 ans.
            Grad améliore de manière significative la conception des terrasses en Douglas :
            - par le Clip JuAn®, les lames sont isolées de leur support ;
            - le dessus légèrement bombé favorise l'écoulement rapide de l'eau de pluie ;
            - le rapport maximal entre épaisseur et largeur est réduit de 6 à 5.
            Selon les termes de la norme régissant les platelages extérieurs en bois (DTU 51-4), ces améliorations de la conception des lames permettent à celles-ci de répondre aux sollicitations de la classe 4.</p>
    </div>
    <div class="col-md-6">
        <img src=../Ressources/produits/douglas.jpg
             class="" style="height: 400px; width: 900px;">
    </div>
</div>

<hr class="featurette-divider">

<div class="row featurette">
    <div class="col-md-6 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1 text-center m-5">Le bois Kebony</h2>
        <p class="lead">Le Kebony est beaucoup plus stable que le bois massif traditionnel.
            Sa couleur chaude brun-rouge s’apparente à celle des essences
            tropicales, et évoluera vers une patine argentée qui lui gardera toute sa
            noblesse. Même sans aucune forme d’entretien, la longévité du Kebony
            est impressionnante.
            La société Kebony a été lauréate de nombreux et prestigieux prix pour
            ses innovations au service de la préservation de la ressource bois dans le
            cadre d’une démarche respectueuse de l’environnement.</p>
    </div>
    <div class="col-md-6 order-md-1">
        <img src=../Ressources/produits/Kebony.jpg
             class="" style="height: 400px; width: 900px;">
    </div>
</div>

<hr class="featurette-divider">
<?php include 'footer.php'?>
</body>
</html>