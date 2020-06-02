<?php
session_start();

include_once('bdd.php');
if (empty($_POST['nom']) or empty($_POST['salaire']) or empty($_POST['tel']) or empty($_POST['description'])) {
    header('Location:http://localhost:8080/TP/index.php');
    exit;
}

$ancien_nom = $_SESSION['offre'];
$nom = htmlspecialchars($_POST['nom']);
$salaire = htmlspecialchars($_POST['salaire']);
$description = htmlspecialchars($_POST['description']);
$tel = htmlspecialchars($_POST['tel']);
$query1 = $pdo->prepare("UPDATE pole_emploi.offres SET nom_offre=\"$nom\", description_offre=\"$description\", salaire=\"$salaire\", tel=\"$tel\" WHERE nom_offre=\"$ancien_nom\";");
$query1->execute();
if ($_SESSION['table'] == 'entreprise') {
    header('Location: http://localhost:8080/TP/index.php');
    exit;
} else {
    header('Location: http://localhost:8080/TP/index.php');
    exit;
}
?>