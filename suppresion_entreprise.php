<?php 
include_once('bdd.php');


if(empty($_POST['nom'])) {
    echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./moderation_entreprises.php\">Réesayer</a>";
} else {
    if(isset($_POST['inscription_supp_e'])) {
        $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
        $donnees = [
        'nom' => $_SESSION['nom'],
    ];
    }
}
$nom = $donnees['nom'];
$sql = "DELETE FROM entreprises WHERE nom_entreprise = \"$nom\"";
$query1=$pdo->prepare($sql);
$query1->execute();
    header('Location: http://localhost:8080/TP/moderation_entreprises.php');
    exit;
?>