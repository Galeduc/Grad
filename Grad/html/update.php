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
