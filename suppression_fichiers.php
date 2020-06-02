<?php 
include_once('bdd.php');
$vide = NULL;
$query1 = $pdo->prepare("SELECT * FROM candidats");
$query1->execute();
$liste_cv = $query1->fetchAll();
foreach ($liste_cv as $cv) {
        $cv = $cv['cv'];
        $query2 = $pdo->prepare('UPDATE candidats SET cv = :nom_cv');
        $query2->bindParam(':nom_cv', $vide);
        $query2->execute();
        unlink($cv);
    
}
header('Location: http://localhost:8080/TP/index.php');
        exit;
?>