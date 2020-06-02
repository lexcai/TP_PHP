<?php
include_once('bdd.php');
      /* Cree le nom dans la bdd*/
      /* Cree le prenom dans la bdd*/
      /* Cree le mail dans la bdd*/
      /* Cree le mdp dans la bdd*/
      
    if(empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['email']) OR empty($_POST['mdp'])) {
        echo "Pas de saisie correct veillez remplir tout les champs. <a href=\"./index.php\">Réesayer</a>";
    } else {
        if(isset($_POST['inscription_c'])) {
            $_SESSION['nom'] = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $_SESSION['email'] = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $donnees = [
            'nom' => $_SESSION['nom'],
            'prenom' => $prenom,
            'email' => $_SESSION['email'],
            'mdp' => $mdp,
        ];
        $requete = "INSERT INTO pole_emploi.candidats (nom_candidat, prenom_candidat, mail_candidat, mdp_candidat) VALUES (:nom, :prenom, :email, :mdp)";
            $query1 = $pdo->prepare($requete);
            $query1->execute($donnees);
            header('Location: http://localhost:8080/TP/index.php');
            exit;

    }
}
?>