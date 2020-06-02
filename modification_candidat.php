<?php
include_once('bdd.php');
session_start();
$query1 = $pdo->prepare('SELECT * FROM candidats');
$query1->execute();
$liste_candidats = $query1->fetchAll();
foreach ($liste_candidats as $candidat) {
        $nom = $candidat['nom_candidat'];
        $prenom = $candidat['prenom_candidat'];
        $email = $candidat['mail_candidat'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modification données</title>
    </head>
    <body>
        <h1>Modification Profil</h1>
        <button onclick="window.location.href = 'http://localhost:8080/TP/profil.php';">Retour</button>
        <form action="update_donnes_candidats.php" method="post">
            <input type="text" name="nom" placeholder="NOM" value="<?php echo"$nom"?>" />
            <input type="text" name="prenom" placeholder="PRENOM" value="<?php echo"$prenom"?>" /> <br/>
            <input type="email" name="mail" placeholder="EMAIL" value="<?php echo"$email"?>" />
            <button type="submit">Envoyer</button>
        </form>
    </body>
</html>