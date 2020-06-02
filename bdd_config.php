<?php 
 include_once('bdd.php');
    $query3 = $pdo->prepare ('CREATE TABLE IF NOT EXISTS pole_emploi.entreprises (
        id_entreprise int not null auto_increment,
        nom_entreprise varchar(255) not null,
        mail_entreprise varchar(255) not null,
        MDP_entreprise varchar(72) not null,
        PRIMARY KEY (id_entreprise));');
    $query3->execute();


    $query1 = $pdo->prepare('CREATE TABLE IF NOT EXISTS pole_emploi.offres (
        id_offre int not null auto_increment,
        id_entreprise int not null,
        nom_offre varchar(255) not null,
        description_offre varchar(255) not null,
        salaire int not null,
        tel int(15) not null,
        PRIMARY KEY (id_offre));');
/*      FOREIGN KEY (id_entreprise) REFERENCES entreprises(id_entreprise));');*/
    $query1->execute();

    $query2 = $pdo->prepare('CREATE TABLE IF NOT EXISTS pole_emploi.candidats (
        id_candidat int not null auto_increment,
        nom_candidat varchar(255) not null,
        prenom_candidat varchar(255) not null,
        mail_candidat varchar(255) not null,
        MDP_candidat varchar(72) not null,
        PRIMARY KEY (id_candidat));');
    $query2->execute();


    $query4 = $pdo->prepare ('CREATE TABLE IF NOT EXISTS pole_emploi.admins (
        id_admin int not null auto_increment,
        nom_admin varchar(255) not null,
        email_admin varchar(255) not null,
        MDP_admin varchar(72) not null,
        PRIMARY KEY (id_admin));');
    $query4->execute();
