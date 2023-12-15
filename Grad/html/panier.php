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
include 'nav.php';
$pdo = pdo_connect_mysql();
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

if (isset($_POST['produits_id'], $_POST['quantite']) && is_numeric($_POST['produits_id']) && is_numeric($_POST['quantite'])) {
    $produits_id = (int)$_POST['produits_id'];
    $quantite = (int)$_POST['quantite'];
    $stmt = $pdo->prepare('SELECT * FROM produits WHERE id = ?');
    $stmt->execute([$_POST['produits_id']]);
    $produit = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($produit && $quantite > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($produits_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$produits_id] += $quantite;
            } else {
                $_SESSION['cart'][$produits_id] = $quantite;
            }
        } else {
            $_SESSION['cart'] = array($produits_id => $quantite);
        }
    }
    header('location: panier.php?page=cart');
    exit;
}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    unset($_SESSION['cart'][$_GET['remove']]);
}

if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantite') !== false && is_numeric($v)) {
            $id = str_replace('quantite-', '', $k);
            $quantite = (int)$v;
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantite > 0) {
                $_SESSION['cart'][$id] = $quantite;
            }
        }
    }
    header('location: panier.php?page=cart');
    exit;
}
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: panier?page=placeorder');
    exit;
}

$produits_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$produits = array();
$subtotal = 0.00;
if ($produits_in_cart) {
    $array_to_question_marks = implode(',', array_fill(0, count($produits_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM produits WHERE id IN (' . $array_to_question_marks . ')');
    $stmt->execute(array_keys($produits_in_cart));
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($produits as $produit) {
        $subtotal += (float)$produit['prix'] * (int)$produits_in_cart[$produit['id']];
    }
}
?>
<div class="cart content-wrapper">
    <h1>Mes produits</h1>
    <form action="panier.php?page=cart" method="post">
        <table>
            <thead>
            <tr>
                <td colspan="2">Produits</td>
                <td>prix</td>
                <td>quantite</td>
                <td>Total</td>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($produits)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">Vous n'avez pas de produits dans votre panier</td>
                </tr>
            <?php else: ?>
                <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td class="img">
                            <a href="index.php?page=product&id=<?=$produit['id']?>">
                                <img src="../img/<?=$produit['img']?>" width="50" height="50" alt="<?=$produit['name']?>">
                            </a>
                        </td>
                        <td>
                            <a href="panier.php?page=product&id=<?=$produit['id']?>"><?=$produit['name']?></a>
                            <br>
                            <br>
                            <br>
                            <a href="panier.php?page=cart&remove=<?=$produit['id']?>" class="remove">Supprime</a>
                        </td>
                        <td class="prix"><?=$produit['prix']?>&euro;</td>
                        <td class="quantite">
                            <input type="number" name="quantite-<?=$produit['id']?>" value="<?=$produits_in_cart[$produit['id']]?>" min="1" max="<?=$produit['quantite']?>" placeholder="quantite" required>
                        </td>
                        <td class="prix"><?=$produit['prix'] * $produits_in_cart[$produit['id']]?> &euro;</td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Sous-Total</span>
            <span class="prix"><?=$subtotal?>&euro;</span>
        </div>
        <div class="buttons">
            <input type="submit" value="Mettre a jours" name="update">
            <input type="submit" value="Passer commande" name="placeorder">
        </div>
    </form>
</div>
</body>
</html>

<style>
    * {
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    html {
        height: 100%;
    }
    body {
        position: relative;
        min-height: 100%;
        color: #555555;
        background-color: #FFFFFF;
        margin: 0;
        padding-bottom: 100px; /* Same height as footer */
    }
    h1, h2, h3, h4, h5 {
        color: #394352;
    }
    .content-wrapper {
        width: 1050px;
        margin: 0 auto;
    }
    header {
        border-bottom: 1px solid #EEEEEE;
    }
    header .content-wrapper {
        display: flex;
    }
    header h1 {
        display: flex;
        flex-grow: 1;
        flex-basis: 0;
        font-size: 20px;
        margin: 0;
        padding: 24px 0;
    }
    header nav {
        display: flex;
        flex-grow: 1;
        flex-basis: 0;
        justify-content: center;
        align-items: center;
    }
    header nav a {
        text-decoration: none;
        color: #555555;
        padding: 10px 10px;
        margin: 0 10px;
    }
    header nav a:hover {
        border-bottom: 1px solid #aaa;
    }
    header .link-icons {
        display: flex;
        flex-grow: 1;
        flex-basis: 0;
        justify-content: flex-end;
        align-items: center;
        position: relative;
    }
    header .link-icons a {
        text-decoration: none;
        color: #394352;
        padding: 0 10px;
    }
    header .link-icons a:hover {
        color: #4e5c70;
    }
    header .link-icons a i {
        font-size: 18px;
    }
    header .link-icons a span {
        display: inline-block;
        text-align: center;
        background-color: #63748e;
        border-radius: 50%;
        color: #FFFFFF;
        font-size: 12px;
        line-height: 16px;
        width: 16px;
        height: 16px;
        font-weight: bold;
        position: absolute;
        top: 22px;
        right: 0;
    }
    main .featured {
        display: flex;
        flex-direction: column;
        background-image: url();
        background-repeat: no-repeat;
        background-size: cover;
        height: 500px;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    main .featured h2 {
        display: inline-block;
        margin: 0;
        width: 1050px;
        font-family: Rockwell, Courier Bold, Courier, Georgia, Times, Times New Roman, serif;
        font-size: 68px;
        color: #FFFFFF;
        padding-bottom: 10px;
    }
    main .featured p {
        display: inline-block;
        margin: 0;
        width: 1050px;
        font-size: 24px;
        color: #FFFFFF;
    }
    main .recentlyadded h2 {
        display: block;
        font-weight: normal;
        margin: 0;
        padding: 40px 0;
        font-size: 24px;
        text-align: center;
        width: 100%;
        border-bottom: 1px solid #EEEEEE;
    }
    main .recentlyadded .produits, main .produits .produits-wrapper {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        padding: 40px 0 0 0;
    }
    main .recentlyadded .produits .product, main .produits .produits-wrapper .product {
        display: block;
        overflow: hidden;
        text-decoration: none;
        width: 25%;
        padding-bottom: 60px;
    }
    main .recentlyadded .produits .product img, main .produits .produits-wrapper .product img {
        transform: scale(1);
        transition: transform 1s;
    }
    main .recentlyadded .produits .product .name, main .produits .produits-wrapper .product .name {
        display: block;
        color: #555555;
        padding: 20px 0 2px 0;
    }
    main .recentlyadded .produits .product .prix, main .produits .produits-wrapper .product .prix {
        display: block;
        color: #999999;
    }
    main .recentlyadded .produits .product .rrp, main .produits .produits-wrapper .product .rrp {
        color: #BBBBBB;
        text-decoration: line-through;
    }
    main .recentlyadded .produits .product:hover img, main .produits .produits-wrapper .product:hover img {
        transform: scale(1.05);
        transition: transform 1s;
    }
    main .recentlyadded .produits .product:hover .name, main .produits .produits-wrapper .product:hover .name {
        text-decoration: underline;
    }
    main > .product {
        display: flex;
        padding: 40px 0;
    }
    main > .product > div {
        padding-left: 15px;
    }
    main > .product h1 {
        font-size: 34px;
        font-weight: normal;
        margin: 0;
        padding: 20px 0 10px 0;
    }
    main > .product .prix {
        display: block;
        font-size: 22px;
        color: #999999;
    }
    main > .product .rrp {
        color: #BBBBBB;
        text-decoration: line-through;
        font-size: 22px;
        padding-left: 5px;
    }
    main > .product form {
        display: flex;
        flex-flow: column;
        margin: 40px 0;
    }
    main > .product form input[type="number"] {
        width: 400px;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        color: #555555;
        border-radius: 5px;
    }
    main > .product form input[type="submit"] {
        background: #4e5c70;
        border: 0;
        color: #FFFFFF;
        width: 400px;
        padding: 12px 0;
        text-transform: uppercase;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
    }
    main > .product form input[type="submit"]:hover {
        background: #434f61;
    }
    main > .produits h1 {
        display: block;
        font-weight: normal;
        margin: 0;
        padding: 40px 0;
        font-size: 24px;
        text-align: center;
        width: 100%;
    }
    main > .produits .buttons {
        text-align: right;
        padding-bottom: 40px;
    }
    main > .produits .buttons a {
        display: inline-block;
        text-decoration: none;
        margin-left: 5px;
        padding: 12px 20px;
        border: 0;
        background: #4e5c70;
        color: #FFFFFF;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
    }
    main > .produits .buttons a:hover {
        background: #434f61;
    }
    main .cart h1 {
        display: block;
        font-weight: normal;
        margin: 0;
        padding: 40px 0;
        font-size: 24px;
        text-align: center;
        width: 100%;
    }
    main .cart table {
        width: 100%;
    }
    main .cart table thead td {
        padding: 30px 0;
        border-bottom: 1px solid #EEEEEE;
    }
    main .cart table thead td:last-child {
        text-align: right;
    }
    main .cart table tbody td {
        padding: 20px 0;
        border-bottom: 1px solid #EEEEEE;
    }
    main .cart table tbody td:last-child {
        text-align: right;
    }
    main .cart table .img {
        width: 80px;
    }
    main .cart table .remove {
        color: #777777;
        font-size: 12px;
        padding-top: 3px;
    }
    main .cart table .remove:hover {
        text-decoration: underline;
    }
    main .cart table .prix {
        color: #999999;
    }
    main .cart table a {
        text-decoration: none;
        color: #555555;
    }
    main .cart table input[type="number"] {
        width: 68px;
        padding: 10px;
        border: 1px solid #ccc;
        color: #555555;
        border-radius: 5px;
    }
    main .cart .subtotal {
        text-align: right;
        padding: 40px 0;
    }
    main .cart .subtotal .text {
        padding-right: 40px;
        font-size: 18px;
    }
    main .cart .subtotal .prix {
        font-size: 18px;
        color: #999999;
    }
    main .cart .buttons {
        text-align: right;
        padding-bottom: 40px;
    }
    main .cart .buttons input[type="submit"] {
        margin-left: 5px;
        padding: 12px 20px;
        border: 0;
        background: #4e5c70;
        color: #FFFFFF;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        border-radius: 5px;
    }
    main .cart .buttons input[type="submit"]:hover {
        background: #434f61;
    }
    main .placeorder h1 {
        display: block;
        font-weight: normal;
        margin: 0;
        padding: 40px 0;
        font-size: 24px;
        text-align: center;
        width: 100%;
    }
    main .placeorder p {
        text-align: center;
    }
    footer {
        position: absolute;
        bottom: 0;
        border-top: 1px solid #EEEEEE;
        padding: 20px 0;
        width: 100%;
    }
</style>