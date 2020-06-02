<?php 
include_once('bdd.php');
session_start();

if (empty(htmlspecialchars($_POST['email'])) AND empty(htmlspecialchars($_POST['mdp'])) OR empty(htmlspecialchars($_POST['mdp'])) OR empty(htmlspecialchars($_POST['email']))) { 
    echo "Pas de saisie d'identifiant. <a href=\"./index.php\">Réesayer</a>";
} else {
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
    $_SESSION['mdp'] = htmlspecialchars($_POST['mdp']);
    $query1 = $pdo->prepare('SELECT * FROM entreprises');
        $query1->execute();
        $liste_email = $query1->fetchAll();
        foreach ($liste_email as $name) {
            $email = $name['mail_entreprise'];
            if ($_SESSION['email'] == $email) {
                $_SESSION['nom'] = $name['nom_entreprise'];
                $_SESSION['table'] = 'entreprises';
                $_SESSION['IS_CONNECTED'] = true;
                $_SESSION['nom'] = $_SESSION['table'].$_SESSION['nom'];
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
                $_SESSION['IS_CONNECTED'] = true;
                $_SESSION['nom'] = $_SESSION['table'].$_SESSION['nom'];
            }
            
        }
    $query3 = $pdo->prepare('SELECT * FROM admins');
        $query3->execute();
        $liste_email = $query3->fetchAll();
        foreach ($liste_email as $name) {
            $email = $name['email_admin'];
            if ($_SESSION['email'] == $email) {
                $_SESSION['table'] = 'admins';
                $_SESSION['nom'] = 'nom_admin';
                $_SESSION['IS_CONNECTED'] = true;
                $_SESSION['nom'] = $_SESSION['table'].$_SESSION['nom'];
            }
        }
        
        
        header('Location: http://localhost:8080/TP/index.php');
        exit;
    }
    

 ?>

