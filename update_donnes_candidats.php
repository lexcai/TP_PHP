<?php
    session_start();
    $ancien_nom = $_SESSION['nom'];
    include_once('bdd.php');
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['mail']);
    $query1 = $pdo->prepare("UPDATE pole_emploi.candidats SET nom_candidat=\"$nom\", prenom_candidat=\"$prenom\", mail_candidat=\"$email\"  WHERE nom_candidat=\"$ancien_nom\";");
    $query1->execute();
    $query2 = $pdo->prepare('SELECT * FROM candidats');
    $query2->execute();
    $liste_candidats = $query2->fetchAll();
    foreach ($liste_candidats as $candidat) {
        if ($candidat['nom_candidat'] == $nom) {
            $_SESSION['nom'] = $candidat['nom_candidat'];
            $_SESSION['prenom'] = $candidat['prenom_candidat'];
            $_SESSION['email'] = $candidat['mail_candidat'];
        }
    }
    header('Location:http://localhost:8080/TP/profil_candidat.php');
    exit;
?>