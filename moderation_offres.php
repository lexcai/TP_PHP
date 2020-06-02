<?php
include_once('bdd.php');  
?>

<!DOCTYPE html>
<html>
<body>
 <h1>Liste des offres</h1>
 <table>
   <thead>
     <tr>
       <th>Nom</th>
       <th>Tel</th>
       <th>ID entreprise</th>
       <th>Description</th>
     </tr>
   </thead>
   <input type="button" name="home" value="Retour" onclick="self.location.href='./index.php'">
   <br>
   <h2>Suppresion d'offres :</h2>
   <form action="suppresion_offres.php" method="post">
            <input type="text" name="nom" placeholder="Nom de l'offre"/>
            <button type="submit" name="inscription_supp_o">Supprimer une offre</button>
        </form>
    <br>
    <h2>Modification d'offres :</h2>
            <form action="form_modif_offres.php" method="post">
            <input type="text" name="nom" placeholder="Nom de l'offre"/>
            <button type="submit" name="inscription_modif_o">Modifier une offre</button>
            </form>
    <br>
    <br>
   <tbody>
     <?php $query1 = $pdo->prepare('SELECT * FROM offres');
  $query1->execute();
  $liste = $query1->fetchAll();
  foreach ($liste as $donnees) {
      ?>
      <tr>
       <td><?php echo $donnees['nom_offre']; ?></td>
       <td><?php echo $donnees['tel']; ?></td>
       <td><?php echo $donnees['id_entreprise']; ?></td>
       <td><?php echo $donnees['description_offre'].'<br>'; ?><br></td>
       </tr>
    <?php
    }
    ?>
    
   </tbody>
 </table>
</body>

</html>