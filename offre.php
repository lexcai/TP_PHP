<!DOCTYPE html>
<html>
<head>
    <title>Offre</title>
</head>
<body>
<?php
    $nom_offre = $_GET['nom'];
    $description_offre = $_GET['description'];    
    $salaire_offre = $_GET['salaire'];
    $tel_offre = $_GET['tel'];
?>
<p>
    Le nom de l'offre est : <?php echo $nom_offre?> <br>
    Voici sa description : <?php echo $description_offre?> <br>
    Son salaire annuel : <?php echo $salaire_offre?> <br>
    Son numéro de téléphone : <?php echo $tel_offre?>
</p>