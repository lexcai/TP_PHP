<?php
include_once('bdd.php');  
?>

<!DOCTYPE html>
<html>
<head>Table entreprises</head>
<br>
<body>
 <table>
   <thead>
   <input type="button" name="home" value="Retour" onclick="self.location.href='./index.php'">
    <br>
    <h2>Suppresion entreprise :</h2>
   <form action="suppresion_entreprise.php" method="post">
            <input type="text" name="nom" placeholder="Nom de l'entreprise"/>
            <button type="submit" name="inscription_supp_e">Envoyer</button>
    </form>
    <br>
     <tr>
       <th>Nom</th>
       <th>Email</th>
     </tr>
   </thead>
   <tbody>
     
     <?php $query1 = $pdo->prepare('SELECT * FROM entreprises');
  $query1->execute();
  $liste = $query1->fetchAll();
  foreach ($liste as $donnees) {
      ?>
      <tr>
       <td><?php echo $donnees['nom_entreprise']; ?></td>
       <td><?php echo $donnees['mail_entreprise']; ?></td>
       </tr>
    <?php
    }
    ?>
    </tr>
   </tbody>
 </table>
</body>

</html>