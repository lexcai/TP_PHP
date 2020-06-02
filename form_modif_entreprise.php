<?php
    include_once('bdd.php');
    session_start();
    if(isset($_POST['modif_e'])) {
    $_SESSION['entreprise'] = $_POST['nom'];
    $query1 = $pdo->prepare('SELECT * FROM offres');
    $query1->execute();
    $liste_entreprise = $query1->fetchAll();
    foreach ($liste_entreprise as $entreprise) {
            $nom = $entreprise['nom_entreprise'];
            $email = $entreprise['mail_entreprise'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire modification entreprise</title>
    <meta name="description" content="Formulaire modification entreprise"/>
</head>
<body>
    <h1>Formulaire modification entreprise</h1>
    <button onclick="window.location.href = 'http://localhost:8080/TP/index.php';">Retour</button>
        <form action="modification_offres.php" method="post">
            <input type="text" name="nom" placeholder="NOM" value="<?php echo "$nom" ?>" />
            <input type="text" name="email" placeholder="EMAIL" value="<?php echo "$email" ?>" /> <br/>
            <button type="submit">Modifier</button>
        </form>
</body>
</html>