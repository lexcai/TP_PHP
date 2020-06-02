<?php
include_once('bdd.php');
      /* Cree le nom de l'entreprise dans la bdd*/
      /* Cree le mail de l'entreprise dans la bdd*/
      /* Cree le mdp de l'entreprise dans la bdd*/

    if(empty($_POST['nom']) OR empty($_POST['email']) OR empty($_POST['mdp'])) {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./index.php\">Réesayer</a>";
    } else {
        if(isset($_POST['inscription_e'])) {
            $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
            $_SESSION['email'] = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $donnees = [
            'nom' => $_SESSION['nom'],
            'email' => $_SESSION['email'],
            'mdp' => $mdp,
        ];
        $requete = "INSERT INTO pole_emploi.entreprises (nom_entreprise, mail_entreprise, mdp_entreprise) VALUES (:nom, :email, :mdp)";
            $query1 = $pdo->prepare($requete);
            $query1->execute($donnees);
            header('Location: http://localhost:8080/TP/index.php');
            exit;
    }
}
?>