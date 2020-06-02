<?php 
include_once('bdd.php');


if(empty($_POST['nom'])) {
    echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./moderation_candidats.php\">Réesayer</a>";
} else {
    if(isset($_POST['inscription_supp_c'])) {
        $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
        $donnees = [
        'nom' => $_SESSION['nom'],
    ];
    }
}
$nom = $donnees['nom'];
$sql = "DELETE FROM candidats WHERE nom_candidat = \"$nom\"";
$query1=$pdo->prepare($sql);
$query1->execute();
    header('Location: http://localhost:8080/TP/moderation_candidats.php');
    exit;
?>