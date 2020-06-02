<?php
include_once('bdd.php');
session_start();
 
    $query1 = $pdo->prepare('SELECT * FROM entreprises');
    $query1->execute();
    $liste_entreprise = $query1->fetchAll();
    foreach ($liste_entreprise as $entreprise) {
            $nom = $entreprise['nom_entreprise'];
            $email = $entreprise['mail_entreprise'];
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modification données</title>
    </head>
    <body>
        <h1>Modification Profil</h1>
        <?php 
        if ($_SESSION['table']  == 'admins') {
            ?><button onclick="window.location.href = 'http://localhost:8080/TP/moderation_entreprises.php';">Retour</button>
        <?php }
        if ($_SESSION['table']  == 'entreprises') {
            ?><button onclick="window.location.href = 'http://localhost:8080/TP/profil_entreprise.php';">Retour</button>
        <?php }
        ?>
        
        <form action="update_donnes_entreprises.php" method="post">
            <input type="text" name="nom" placeholder="NOM" value="<?php echo"$nom"?>" />
            <input type="email" name="mail" placeholder="EMAIL" value="<?php echo"$email"?>" />
            <button type="submit" name="modif_entreprise">Envoyer</button>
        </form>
    </body>
</html>