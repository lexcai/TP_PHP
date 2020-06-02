<?php
    session_start();
    $ancien_nom = $_SESSION['nom'];
    include_once('bdd.php');
    if(isset($_POST['modif_entreprise'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['mail']);
        $query1 = $pdo->prepare("UPDATE pole_emploi.entreprises SET nom_entreprise=\"$nom\", mail_entreprise=\"$email\"  WHERE nom_entreprise=\"$ancien_nom\";");
        $query1->execute();
        $query2 = $pdo->prepare('SELECT * FROM entreprises');
        $query2->execute();
        $liste_entreprise = $query2->fetchAll();
        foreach ($liste_entreprise as $entreprise) {
            if ($entreprise['nom_entreprise'] == $nom) {
                $_SESSION['nom'] = $entreprise['nom_entreprise'];
                $_SESSION['email'] = $entreprise['mail_entreprise'];
            }
        }
        var_dump($_POST);
        var_dump($entreprise);
        die;
    }

            header('Location:http://localhost:8080/TP/profil_entreprise.php');
            exit;
 ?>