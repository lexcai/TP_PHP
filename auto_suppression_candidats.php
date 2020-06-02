<?php
session_start();
include_once('bdd.php');

$nom = $_SESSION['nom'];
$requete = "DELETE FROM candidats WHERE nom_candidat = \"$nom\"";
$query1=$pdo->prepare($requete);
$query1->execute();
$_SESSION['IS_CONNECTED'] = FALSE;
header('Location: http://localhost:8080/TP/index.php');
exit;
?>