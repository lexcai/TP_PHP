<?php
include_once('bdd.php');  
?>

<!DOCTYPE html>
<html>
<body>
 <h1>Liste des utilisateurs</h1>
 <table>
   <head>
   <input type="button" name="home" value="Retour" onclick="self.location.href='./index.php'">
    <br>
    <h2>Suppresion entreprise :</h2>
    <form action="suppression_candidats.php" method="post">
            <input type="text" name="nom" placeholder="Nom du candidat"/>
            <button type="submit" name="inscription_supp_c">Envoyer</button>
        </form>
     <tr>
       <th >Nom</th>
       <th >Prenom</th>
       <th >Email</th>
     </tr>
   </head>
   <body>
     
     <?php $query1 = $pdo->prepare('SELECT * FROM candidats');
  $query1->execute();
  $liste = $query1->fetchAll();
  foreach ($liste as $donnees) {
      ?>
      <tr>
       <td ><?php echo $donnees['nom_candidat']; ?></td>
       <td ><?php echo $donnees['prenom_candidat']; ?></td>
       <td ><?php echo $donnees['mail_candidat']; ?></td>
       </tr>
    <?php
    }
    ?>
    
    <br>
   </body>
 </table>
</body>

</html>