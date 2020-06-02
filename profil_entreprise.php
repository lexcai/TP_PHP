<?php
    session_start();
    include_once('bdd.php');
    if ($_SESSION['IS_CONNECTED']) {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Profil</title>
            <meta name="description" content="Profil entreprise"/>
        </head>
        <body>
            <?php
                $query1 = $pdo->prepare('SELECT * FROM entreprises');
                $query1->execute();
                $liste_entreprises = $query1->fetchAll();
                foreach ($liste_entreprises as $entreprise) {
                         $nom = $entreprise['nom_entreprise'];
                        $email = $entreprise['mail_entreprise'];
                    }
                ?>
                    <div class="info">
                    <h1>
                    <?php echo $nom ?>
                    </h1>
                    <button onclick="window.location.href = 'http://localhost:8080/TP/modification_entreprise.php';">Pour Modifier vos données</button>
                    <button onclick="window.location.href = 'http://localhost:8080/TP/index.php';">Retour</button>
                        <?php
                        if (! empty($nom)) {
                        ?>
                        <p> Votre Nom d'entreprise est <strong class="important">
                        <?php
                            echo $nom;
                        ?>
                        </p>
                        </strong>
                        <?php
                        }
                        if (! empty($email)) {
                        ?>
                        <p> Votre adresse mail est <strong class="important">
                        <?php
                            echo $email;
                        ?>
                        </strong>
                        </p>
                        <?php
                        }
                        ?>
               </div>
        </body>
        </html>
    <?php
    }

?>

