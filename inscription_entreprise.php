<?php

if(isset($_POST['inscription_e'])) {
   $nom_entreprise = htmlspecialchars($_POST['nom_entreprise']);
   $mail = htmlspecialchars($_POST['mail']);
   $mdp = htmlspecialchars($_POST['mdp']);
   if(!empty($_POST['nom_entreprise']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])) {
      /* Cree le nom de l'entreprise dans la bdd*/
      /* Cree le mail dans la bdd*/
      /* Cree le mdp dans la bdd*/
      echo "Votre compte a bien été créé ! <a href=\"./index.php\">Me connecter</a>"; 
      } else {
         echo "Tous les champs doivent être complétés !";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Inscription entreprise</title>
   <meta charset="utf-8">
<body>
<h1 align="center">Inscription entreprise</h1>
<input type="button" name="home" value="Retour" onclick="self.location.href='./index.php'">
<div align="center">
         <br><br>
         <form method="POST" action="creation_entreprise.php">
            <table>
               <tr>
                     <label for="nom_entreprise">Nom de votre entreprise :</label>
                     <input name="nom" type="text" placeholder="Votre nom d'entreprise"/>
                  </tr>
               <tr>
                     <label for="mail">Email :</label>
                     <input name="email"  type="email" placeholder="Votre mail"/>
               </tr>
               <tr>
                     <label for="mdp">Mot de passe :</label>
                     <input name="mdp"  type="text" placeholder="Votre mot de passe"/>
                  </tr>
              <tr>
                 <br />
                     <input type="submit" name="inscription_e"/>
                </tr>
            </table>
         </form>
      </div>
   </body>
</html>
