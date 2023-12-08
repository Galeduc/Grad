<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Grad</title>
    <script src="https://kit.fontawesome.com/59fa4e08aa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" integrity="sha512-eEdkKfYV/yKmpeDVb618mtl/JrJka0Y2ONEjJ9AjUazHpsRf+zm+eROxUqUKz3r89rR5tTyatSbkSlVNF/T1FQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <h1 class="display-3">Contactez nous </h1>
    </div>
</div>
<form action="" method="post">
<div class="container form-container">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
        </div>
        <div class="mb-3">
            <label for="cp" class="form-label">Code Postal</label>
            <input type="text" class="form-control" id="cp" name="cp" placeholder="Code Postal" aria-describedby="inputGroupPrepend2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
        </div>
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="tel" name="tel" placeholder="Telephone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" class="form-control" id="message" name="message" placeholder="Message" required>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
</form>
</body>
</html>
<style>
    body {
        background-color: #f8f9fa;
    }

    .form-container {
        max-width: 600px;
        margin: auto;
    }
</style>

<?php
include 'footer.php';
$serveur = "localhost";
$dbname = "Grad";
$user = "mysql";
$pass = "mysql";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $message = $_POST["message"];

    try{
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
            INSERT INTO form(nom, prenom, cp, email, tel, message)
            VALUES(:nom, :prenom, :cp, :email, :tel, :message)");
        $sth->bindParam(':nom',$nom);
        $sth->bindParam(':prenom',$prenom);
        $sth->bindParam(':cp',$cp);
        $sth->bindParam(':email',$email);
        $sth->bindParam(':tel',$tel);
        $sth->bindParam(':message',$message);
        $sth->execute();
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();{
        }
    }
}
?>