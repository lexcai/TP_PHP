<?php
include_once('bdd.php');
    session_start();
    if (isset($_SESSION['IS_CONNECTED'])) {
    $query1 = $pdo->prepare('SELECT * FROM entreprises');
        $query1->execute();
        $liste_email = $query1->fetchAll();
        foreach ($liste_email as $name) {
            $email = $name['mail_entreprise'];
            if ($_SESSION['email'] == $email) {
                $_SESSION['nom'] = $name['nom_entreprise'];
                $_SESSION['table'] = 'entreprises';
            }
        }

    $query2 = $pdo->prepare('SELECT * FROM candidats');
        $query2->execute();
        $liste_email = $query2->fetchAll();
        foreach ($liste_email as $name) {
            $email = $name['mail_candidat'];
            if ($_SESSION['email'] == $email) {
                $_SESSION['nom'] = $name['nom_candidat'];
                $_SESSION['table'] = 'candidats';
            }
        }
    $query3 = $pdo->prepare('SELECT * FROM admins');
        $query3->execute();
        $liste_email = $query3->fetchAll();
        foreach ($liste_email as $name) {
            $email = $name['email_admin'];
            if ($_SESSION['email'] == $email) {
               $_SESSION['table'] = 'admins';
            }
        }
    $Nom_utilisateur = $_SESSION['table'].' '.$_SESSION['nom'];
    if ($_SESSION['table']  == 'candidats' OR $_SESSION['table']  == 'entreprises') {
    echo "Bonjour $Nom_utilisateur";
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
</head>

<body>
<h1>Accueil</h1>

<?php /*Formulaire connexion Ok*/ ?>
<?php if (!isset($_SESSION['IS_CONNECTED'])) {?>
        <form action="connexion.php" method="post">
            <input type="text" name="email" placeholder="EMAIL" />
            <input type="password" name="mdp" placeholder="MOT DE PASSE" />
            <button type="submit">Connexion</button>
        </form>
<?php } ?>

<?php /*Liens d'inscription[OK]*/ ?>

<?php if (!isset($_SESSION['IS_CONNECTED'])) {

?>
<a href="./inscription_candidat.php">Inscription candidat</a>
<a href="./inscription_entreprise.php">Inscription entreprise</a>
<?php 
        }
?>


<?php /*Liens de moderation[en cours]
        Probleme :
        mise en page
        suppresion d'une colonne dans la bdd
        */ ?>
<?php if (isset($_SESSION['IS_CONNECTED'])) {
        if ($_SESSION['table']  == 'admins') {
            
?>
<a href="./moderation_candidats.php">Moderation candidat</a>
<a href="./moderation_entreprises.php">Moderation entreprise</a>
<a href="./moderation_offres.php">Moderation offres</a>

<?php }
        }
?>

<br><br><br>

<?php if (isset($_SESSION['IS_CONNECTED'])) {
        if ($_SESSION['table']  == 'candidats') { ?>
<button onclick="window.location.href = 'http://localhost:8080/TP/profil_candidat.php';">Mon Profil</button>
<?php }} ?>

<?php if (isset($_SESSION['IS_CONNECTED'])) {
        if ($_SESSION['table']  == 'entreprises') { ?>
<button onclick="window.location.href = 'http://localhost:8080/TP/profil_entreprise.php';">Mon Profil</button>
<?php }} ?>

<?php /*Bouton Deconnexion [OK]*/ ?>

<?php if (isset($_SESSION['IS_CONNECTED'])) {?>
<form action="deconnexion.php" method="post">
<button type="submit">Deconnexion</button>
<?php } ?>

</form>
<br><br><br>
<?php
            /* Affichage formulaire cv [OK]/ Telechargement cv [OK]/ Liste CV [OK]/ Transformation en pdf[en cours]
                Probleme  
                : filepath non reconnu peut etre cree un colonne
                dans la bdd pour les referencer et pouvoir 
                les supprimer sans problemes

                : Suppresion du dernier fichier du au filepath*/

?>
<?php if (isset($_SESSION['IS_CONNECTED'])) {
        if ($_SESSION['table']  == 'candidats') { ?>
        <h2>Supprimer son compte :</h2>
        <button onclick="window.location.href = 'http://localhost:8080/TP/auto_suppression_candidats.php';">Supprimer</button>
        <br>
        <h2>Ajouter un Cv :</h2>
        <form action="formulaire_cv.php" method="post" enctype="multipart/form-data">
            <input type="text" name="fileName" placeholder="Titre du CV"/>
            <input type="file" name="file" id="file">
            <button type="submit">Envoyer</button>
        </form>
        <table>
            <tr> <th> Vos CVs </th> </tr>
            <?php
                $nom_dossier = $_SESSION['email'];
                $query1 = $pdo->prepare('SELECT * FROM candidats');
                $query1->execute();
                $cv = $query1->fetchAll();
                foreach ($cv as $CV) {
                    $cv = $CV['cv'];
                }
                    if (file_exists($nom_dossier)) {
                        $dossier = getcwd() . '\\' . $nom_dossier;
                        $tableau = scandir($dossier);
                        foreach($tableau as $element) {
                            if ($element != '.' and $element != '..') {
                                ?>
                                
                                <tr> <td>
                                <?php /*<?php echo "<a href="."$nom_cv"." download="."$cv".">Télécharger ";?> 
                                <?php a>*/
                                echo "$element<br>"; 
                                    $chemin = $nom_dossier . '/' . $element; ?> <br>
                                <?php echo "<a href='http://localhost:8080/TP/$chemin'.' download='.'$element'.'>Télécharger ";?></a><br><br><br>
                                <button onclick="window.location.href = 'http://localhost:8080/TP/suppression_fichiers.php';">Supprimer</button>

                                </td> </tr>
                <?php
                        }
                    }
                }
        }?>
        
        </table>
    <?php }?>

<?php /* Affichage formulaire offre [OK]/ Liste Offre personnel a l'entreprise [en cours]
                Probleme  
                */
?>

<?php if (isset($_SESSION['IS_CONNECTED'])) {
        if ($_SESSION['table']  == 'entreprises') { ?>
        <h2>Supprimer son compte :</h2>
        <button onclick="window.location.href = 'http://localhost:8080/TP/auto_suppression_entreprise.php';">Supprimer</button>
        <br>
        <h2>Creation d'offres :</h2>
        <form action="creation_offres.php" method="post">
            <input type="text" name="nom" placeholder="Titre de l'offre"/>
            <input type="text" maxlenght="15"  name="tel" placeholder="Numéro de tel">
            <input type="text" name="salaire" placeholder="Salaire par an">
            <TEXTAREA  type="text" name="descri" rows=4 cols=40 placeholder="Descritpion de l'emploi (limite 255 caractères)"></TEXTAREA>
            <button type="submit" name="inscription_o">Envoyer</button>
        </form>
<?php  
      }} ?>
<?php       $query1 = $pdo->prepare('SELECT * FROM offres');
            $query1->execute();
            $liste_offres = $query1->fetchAll(); ?>
            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                if ($_SESSION['table']  == 'entreprises') { ?>
            <p>Modifier une offre :</p>
            <form action="form_modif_offres.php" method="post">
            <input type="text" name="nom" placeholder="Nom de l'offre"/>
            <button type="submit" name="inscription_modif_o">Envoyer</button>
            </form>
            <p>Supprimer une offre :</p>
            <form action="suppresion_offres.php" method="post">
            <input type="text" name="nom" placeholder="Nom de l'offre"/>
            <button type="submit" name="suppression_o">Envoyer</button>
            </form>

            <?php } }
                echo "<h2>Liste des offres :</h2>";
                foreach ($liste_offres as $offres) {
                    $nom_offre = $offres['nom_offre'];
                    $description_offre = $offres['description_offre'];
                    $salaire_offre = $offres['salaire'];
                    $tel_offre =$offres['tel'];
                    $parametre = "nom=$nom_offre&description=$description_offre&salaire=$salaire_offre&tel=$tel_offre";
                    ?>
                    <div class="offre">
                    <?php
                        echo "<a class=\"decoration\" href=\"offre.php?$parametre\">";
                    ?>
                    <h2>
                    <?php
                        echo $nom_offre;
                    ?>
                    </h2>
                    </a>
                   
                </div>
            <?php
            }
        ?>
</body>
</html>