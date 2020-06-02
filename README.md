# TP PHP POLE EMPLOI:

Le site se compose des pages, boutons et fonctionnalitées suivantes :

- Accueil
- Inscription Candidats
- Inscription Entreprises
- Suppression Compte Candidat (marche mais ne retourne pas sur la bonne page)
- Suppression Compte Entreprise (marche mais ne retourne pas sur la bonne page)
- Profil Candidats
- Profil Entreprises
- Modification profil Candidat
- Modification profil Entreprise
- Modification offres pour les Entreprises
- Ajout de CV Candidat
- Telechargement du CV Candidat
- Suppresion CV Candidat
- Page Root
- Moderation Entreprises 
- Moderation Candidats
- Moderation et CRUD Offres

## Pour importer la Base de Données et démarrer:

Lancer XAMPP

Activer le serveur Apache et sql

Aller sur la page phpmyadmin

Clique sur "Importer"

Choisir le fichier 127_0_0_1(1).sql

Ouvrir une nouvelle page et saisir index.php

## Connexion:

On peut se connecter depuis un seul et même endroit avec les logins de la BDD,
c'est a dire que root peut se connecter sur le même formulaire de connexion qu'un candidat ou une entreprise.

## Identifiants:

- ROOT :
email = root
mdp = root

- Candidats:
email = axel.boudeau@ynov.com
mdp = toto

- Entreprises:
email = apb@apb.com
mdp = toto
email = renov@bat.com
mdp = toto

## Tâches non fini:

- CSS : Pas assez de temps pour rendre le site et fonctionnel et beau.

- Peut postuler à des offres (et recevoir une réponse): Pas assez de temps.

- Peut voir la liste des candidats qui ont postulés à une offre (voir cv): Pas assez de temps.

- Peut répondre à un candidat: Pas assez de temps.

- Redirection sur la bonne page au moment de la suppression du candidat ou de l'entreprise mais la suppression et quand même effectuer dans la bdd: Pas assez de temps.

- Pas de transformation au format PDF: (Pas trouver comment faire sur internet) ni de restriction d'extension de fichier: Pas assez de temps.

- Publications possibles de plusieurs CV au lieu d'un seul : Ca doit pas etre trés dur a faire mais j'ai pas eu le temps de chercher.