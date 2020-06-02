<?php
    session_start();
    include_once('bdd.php');
    if ($_SESSION['IS_CONNECTED']) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Profil</title>
            <meta name="description" content="Profil utilisateur"/>
        </head>
        <body>
            <?php
                $query1 = $pdo->prepare('SELECT * FROM candidats');
                $query1->execute();
                $liste_candidats = $query1->fetchAll();
                foreach ($liste_candidats as $candidat) {
                        $nom = $candidat['nom_candidat'];
                        $prenom = $candidat['prenom_candidat'];
                        $email = $candidat['mail_candidat'];
                    }
                ?>
                    <div class="info">
                    <h1>
                    <?php echo $prenom . ' ' . $nom ?>
                    </h1>
                    <button onclick="window.location.href = 'http://localhost:8080/TP/modification_candidat.php';">Pour Modifier vos données</button>
                    <button onclick="window.location.href = 'http://localhost:8080/TP/index.php';">Retour</button>
                        <p> Votre Nom de Famillle est <strong class="important">
                        <?php
                            echo $nom;
                        ?>
                        </p>
                        </strong>
                        <p> Votre Prénom est <strong class="important">
                        <?php
                            echo $prenom;
                        ?>
                        </p>
                        </strong>
                        <p> Votre adresse mail est <strong class="important">
                        <?php
                            echo $email;
                        ?>
                        </strong>
                        </p>
                        <?php
                        ?>
                    </div>
        </body>
        </html>
    <?php
    }

?>

