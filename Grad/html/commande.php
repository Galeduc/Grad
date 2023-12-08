<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Grad</title>
    <script src="https://kit.fontawesome.com/59fa4e08aa.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.es.min.js" integrity="sha512-89Ar0ofqIrPG0GKRxVyihfyrZP3wApwUKRU5SxDLyk/o5OF3yVE6zNm30byp89uKsboFNinM2DEHYGOKTEIvPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
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
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="../img/accoya.jpg" alt="..." height="250"  />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">Accoya</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            18.00€
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-secondary text-white mt-auto" href="#">Ajouter au panier</a></div>
                    </div>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="../img/thermofrene.png" alt="..." height="250"  />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">Thermofrene</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            18.00€
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-secondary text-white mt-auto" href="#">Ajouter au panier</a></div>
                    </div>
                </div>
            </div>


            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="../img/kebony.jpg" alt="..." height="250"  />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">Kebony</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            18.00€
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-secondary text-white mt-auto" href="#">Ajouter au panier</a></div>
                    </div>
                </div>
            </div>

            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="../img/thermopin.jpg" alt="..." height="250" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">Thermopin</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            40.00€
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-secondary text-white mt-auto" href="#">Ajouter au panier</a></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'?>
</body>
</html>