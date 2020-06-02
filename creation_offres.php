<?php
include_once('bdd.php');
      /* Cree le nom de l'offre dans la bdd*/
      /* Cree la tel dans la bdd*/
      /* Cree le salaire dans la bdd*/
      /* Cree le description dans la bdd*/
      
    if(empty($_POST['nom']) OR empty($_POST['descri']) OR empty($_POST['salaire']) OR empty($_POST['tel'])) {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./index.php\">Réesayer</a>";
    } else {
        if(isset($_POST['inscription_o'])) {
            $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
            $descri = htmlspecialchars($_POST['descri']);
            $salaire = htmlspecialchars($_POST['salaire']);
            $tel = htmlspecialchars($_POST['tel']);
            $donnees = [
            'nom' => $_SESSION['nom'],
            'descri' => $descri,
            'salaire' => $salaire,
            'tel' => $tel,
        ];
        $requete = "INSERT INTO pole_emploi.offres (nom_offre, description_offre, salaire, tel) VALUES (:nom, :descri, :salaire, :tel)";
            $query1 = $pdo->prepare($requete);
            $query1->execute($donnees);
            header('Location: http://localhost:8080/TP/index.php');
            exit;

    }
}
?>