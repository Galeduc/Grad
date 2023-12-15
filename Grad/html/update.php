<?php
$serveur = "localhost";
$dbname = "grad";
$user = "mysql";
$pass = "mysql";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $id = $_POST['id'];
    $etat = $_POST['etat'];

    try {
        $db = new PDO("mysql:host=$serveur;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $db->prepare("UPDATE form SET etat = :etat WHERE id = :id");
        $sth->bindParam(':etat', $etat);
        $sth->bindParam(':id', $id);
        $sth->execute();
    } catch (PDOException $e) {
        echo 'Impossible de mettre à jour l\'état. Erreur : ' . $e->getMessage();
    }
}
?>





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

<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $produits): ?>
            <a href="index.php?page=product&id=<?=$produits['id']?>" class="product">
                <img src="../img/<?=$produits['img']?>" width="200" height="200" alt="<?=$produits['nom']?>">
                <span class="name"><?=$produits['nom']?></span>
                <span class="price">
                <?=$produits['prix']?> &nbsp &euro;
            </span>
            </a>
        <?php endforeach; ?>
    </div>
</div>

