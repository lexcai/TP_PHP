<?php
    include_once('bdd.php');
    session_start();
    if(isset($_POST['inscription_modif_o'])) {
    $_SESSION['offre'] = $_POST['nom'];
    $query1 = $pdo->prepare('SELECT * FROM offres');
    $query1->execute();
    $liste_offres = $query1->fetchAll();
    foreach ($liste_offres as $offre) {
            $nom = $offre['nom_offre'];
            $description = $offre['description_offre'];
            $salaire = $offre['salaire'];
            $tel = $offre['tel'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire modification offre</title>
    <meta name="description" content="Formulaire modification offre"/>
</head>
<body>
    <h1>Formulaire Modification Offre</h1>
    <button onclick="window.location.href = 'http://localhost:8080/TP/index.php';">Retour</button>
        <form action="modification_offres.php" method="post">
            <input type="text" name="nom" placeholder="NOM OFFRE" value="<?php echo "$nom" ?>" />
            <input type="text" name="description" placeholder="DESCRIPTION OFFRE" value="<?php echo "$description" ?>" /> <br/>
            <input type="number" name="salaire" placeholder="SALAIRE OFFRE" value="<?php echo "$salaire" ?>" /> <br/>
            <input type="number" name="tel" placeholder="TEL OFFRE" value="<?php echo "$tel" ?>" /> <br/>
            <button type="submit">Modifier</button>
        </form>
</body>
</html>