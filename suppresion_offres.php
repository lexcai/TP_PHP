<?php 
include_once('bdd.php');
session_start();


if(empty($_POST['nom'])) {
        if ($_SESSION['table']  == 'admins') {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./moderation_offres.php\">Réesayer</a>";
        } if ($_SESSION['table']  == 'entreprises') {
            echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./index.php\">Réesayer</a>";
    }
}

$nom = htmlspecialchars($_POST['nom']);

$sql = "DELETE FROM offres WHERE nom_offre = \"$nom\"";
$query1=$pdo->prepare($sql);
$query1->execute();

if ($_SESSION['table']  == 'admins') {
    header('Location: http://localhost:8080/TP/moderation_offres.php');
    exit;
}
if ($_SESSION['table']  == 'entreprises') {
    header('Location: http://localhost:8080/TP/index.php');
    exit;
}
?>