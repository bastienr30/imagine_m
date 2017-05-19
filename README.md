# README #

### 26.12.16
- arranger le système de scroll *OK AURE*
- replacer les formulaires de commentaire / de proposition / de contact *OK BASTIEN*
- la page 404 avec bootstrap *OK AURE*
- menu déroulant *OK ANNE MARIE*

### 27.12.16
- nombre de commentaires *OK BASTIEN*
- signalement *OK BASTIEN*
- flipcard annonces validées *OK AURE BASTIEN*
- rajout du vrai contenu *OK ANNE MARIE*
- faire les popup des formulaires *OK BASTIEN AURELIE*
- scroll (boutons à droite) *OK AURELIE*

### 28.12.16
- popup commentaire *OK BASTIEN*
- timer carousel *OK ANNE MARIE*
- notion de temps dans les annonces *OK ANNE MARIE*
- récupérer les horaires (ou trouver autre chose), vu avec Aurélie, Anne, finalement on agrandit la map *OK ANNE ET AURELIE*
- pagination en slider pour les annonces *BASTIEN*
- background qui change (aléatoire ) vu avec Anne, *OK AURELIE*

// à faire
- mise en page annonces validées
- faire le site en responsive (vérification et modification si nécessaire)
- vérification des champs des formulaires (si un champ manque, il faut l'indiquer)

### ATTENTION
- finir intégration bitbucket
- prévoir l'export de la base de données / le fonctionnement sur xampp
- carrousel (qui se met en petit) vérifier que le cache du navigateur est activé (f12)

### MODE D'EMPLOI

* Lorsqu'on modifie un fichier sur atom / sublime text ou un autre éditeur
* Sur SourceTree, il faut cliquer sur *Status des fichiers* (menu en bas) puis *stage All*, ensuite *valider* et enfin *envoyer* sur le menu du haut (Push)
* Pour récupérer les fichiers modifier par les autres : cliquer sur *récupérer* sur le menu horizontal du haut (Pull)

    imagine_m1 -> Anne Marie
    imagine_m2 -> Aurélie
    imagine_m3 -> Bastien
    
#Mentions légales
    - mail (brève présentation de l'équipe, nom et prénom, téléphone)
    - coordonnées de l'hébergeur
    - numéro de déclaration simplifiée Cnil (collecte de données sur les clients, cookies ? ip ?)
    - cookies (pourquoi il y a des cookies ? Est-ce qu'ils les accepte (bouton "j'ai compris") et moyen de refuser 
    
#Pour le carousel : 
    - 4 images représentative de chaque catégorie
    - "à vous de jouer"

*Pour les annonces*
Les annonces validées : sont toutes affichées, même s'il y en a 50 (pagination)
    - Elles sont affichées  1 mois
    - Titre / Photo / url du site / description / pseudo de l'utilisateur / catégorie (couleur spécifique à sa catégorie) / (commentaires) / map / horaires /
Les annonces proposées > nombre limité en fonction de l'apparence des annonces
    - Titre / Photo / url du site / Votes & signalement / pseudo de l'utilisateur / commentaires / catégorie (couleur spécifique à sa catégorie)
    - S'il y a trop d'annonces proposées :
        - Liste d'attente composée du pseudo de l'utilisateur / titre / url / catégorie
        - Il peut y avoir maximum 20 annonces dans la file d'attente, au dela de ça, la proposition n'est pas acceptée
            - Quand la file d'attente est pleine, le formulaire de proposition n'est plus disponible et affiche "revenez dans XX jours / prochaine session le XX/XX/2016..."
        - ça nous permet de donner une date exacte d'affichage de TOUTES les annonces dans la file d'attente. "les annonces s'afficheront le XX/XX/2016"
        - Roulement des annonces proposées tous les 15 jours
            - Si elles ont le bon nombre de votes positifs (200) et moins de 50 votes négatifs , elles passent en validées
            - Sinon, elles sont supprimées
            - Si en cours de route elles sont signalées, elles sont simplement supprimées, la file d'attente ne bouge pas

*Pour l'upload des images*
On veut que la largeur de l'image ait une taille minimum
    - L'utilisateur devra être averti par un message "l'image est trop petite" si la largeur n'est pas bonne (plus grande, ce n'est pas grave)
    - On veut aussi que l'image soit retravaillée, qu'un cadre s'affiche à l'upload avec une taille définie (ex: 400px par 350px). Le cadre fera cette taille et l'utilisateur devra retailler / rogner son image en le faisant bouger pour choisir le morceau qui lui convient le mieux (cela évite de se retrouver avec des images trop grandes en hauteur et qui ne seront donc pas affichées correctement)
    - L'image, sur l'annonce ou le carousel aura une class pour gérer sa taille (width: taille; max-width: taille maximum;)
        - on peut éventuellement entourer l'image d'une div pour qu'elle ne dépasse pas en hauteur (height: 350px; overflow: hidden;)
    - https://codepen.io/fasterv_410/pen/yJRLxz

### DEFINITION DE L'ARBORECENSE DU DOSSIER

// LEGENDE
### RACINE
# DOSSIERS PRINCIPAUX
    * `sous-dossiers`
        * pages.extension
*message important*
**non défini**

### W-master

# app
    * `Controller`
        * CommentController.php <!-- méthodes du système de commentaire -->
        * ContactController.php <!-- méthodes de traitement du formulaire de contact -->
        * FormController.php <!-- méthodes de vérification des formulaires -->
        * PropositionController.php <!-- méthodes de traitement du formulaire de proposition d'annonce -->
        * RouteController.php <!-- méthodes de vérification des envois de formulaire sur chaque page -->
        * VoteController.php <!-- méthodes du système de vote -->

    * `Model` <!-- liaison entre le traitement et la base de données -->
        * CommentModel.php
        * ContactModel.php
        * PropositionModel.php
        * VoteModel.php

    * `Views` <!-- affichage des pages -->
        * `page` <!-- les pages principales -->
            * index.php
            * projets.php
        * `section` <!-- les sections qui composent nos pages -->
            * header.php
            * footer.php
            * s-comment.php
            * s-form-contact.php
            * s-form-proposition.php
            * s-index.php
            * s-projets.php
            
    * config.php <!-- liaison à la base de données -->
    * routes.php <!-- chemin vers les pages -->
    
# public
    * `assets`
        * `css`
            * main.css
            * normalize.css
        * `fonts`
            * font "texgyreadventor" (italic, bold, regular, italicbold)
        * `img`
            * `uploads` <!-- images enregistrées par les utilisateurs pour les annonces -->
        * `js`
            * comment.js
            * jquery-3.1.0.min.js <!-- jquery -->
            * less.min.js <!-- utilisation de less sur le css main.less -->
            * menu.js <!-- menu et apparition des formulaires du menu -->
            * tabs.js <!-- gère l'affichage des annonces selon si elles sont validées ou proposées -->
            * votes.js
        * `uploads` <!-- dossier contenant les images proposées par les utilisateurs pour les annonces -->