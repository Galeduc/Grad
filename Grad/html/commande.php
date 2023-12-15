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
<?php
session_start();
$connected = isset($_SESSION['pseudo']);

function pdo_connect_mysql()
{
    $HOST = 'localhost';
    $USER = 'mysql';
    $PASS = 'mysql';
    $NAME = 'grad';
    try {
        return new PDO('mysql:host=' . $HOST . ';dbname=' . $NAME . ';charset=utf8', $USER, $PASS);
    } catch (PDOException $exception) {
        exit('Failed to connect to database!');
    }
}
?>
<?php include 'nav.php'; $pdo = pdo_connect_mysql();

$stmt = $pdo->prepare('SELECT * FROM produits');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container-fluid p-0 position-relative">
    <img src="../Ressources/entete01.jpg" class="img-fluid w-100" alt="Bienvenue chez Grad">
    <div class="center-text text-center text-white">
        <h1 class="display-3">Nos Produits</h1>
    </div>
</div>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($recently_added_products as $produits): ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="../img/<?=$produits['img']?>" width="200" height="200"/>
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder"><?=$produits['nom']?></h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <?=$produits['prix']?> &euro;
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <form action="panier.php?page=cart" method="post">
                            <input type="number" name="quantite" value="1" min="1" max="<?=$produits['quantite']?>" placeholder="Quantity" required>
                            <input type="hidden" name="produits_id" value="<?=$produits['id']?>">
                            <br>
                            <div class="text-center"><input class="btn btn-secondary text-white mt-auto" type="submit" value="Ajouter au panier"></div>
                    </div>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
                </div>
            </div>
</section>
<?php include 'footer.php'?>
</body>
</html>