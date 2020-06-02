
<!DOCTYPE html>
<html>
<head>
   <title>Inscription candidat</title>
   <meta charset="utf-8">
<body>
<h1 align="center">Inscription Candidat</h1>
<input type="button" name="home" value="Retour" onclick="self.location.href='./index.php'">
<div align="center">
         <br /><br />
         <form method="POST" action="creation_candidat.php">
            <table>
               <tr>
                  
                     <label for="nom">Nom :</label>
                     <input name="nom" type="text" placeholder="Votre nom"/>
                  
               </tr>
               <tr>
                     <label for="prenom">Prenom :</label>
                     <input name="prenom" type="text" placeholder="Votre prénom"/>
                  </tr>
                  <tr>
                     <label for="email">Email :</label>
                     <input name="email" type="email" placeholder="Votre mail"/>
                 </tr>
               <tr>
                     <label for="mdp">Mot de passe :</label>
                     <input name="mdp" type="text" placeholder="Votre mot de passe"/>
                 </tr>
              <tr>
                     <br />
                     <input type="submit" name="inscription_c"/>
                  </td>
               </tr>
            </table>
         </form>
      </div>
   </body>
</html>