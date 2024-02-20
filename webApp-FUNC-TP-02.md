**Énoncé :**

**Création d'une application PHP de gestion d'utilisateurs avec une base de données MySQL en local :**

L'objectif de ce projet est de développer une application en PHP en programmation fonctionnelle, permettant la gestion d'utilisateurs avec une base de données MySQL en local. La table "utilisateurs" devra comporter les champs suivants : id (auto-incrément), nom, prénom, email, password. Pour garantir la sécurité de l'application, il est impératif de mettre en place des mesures préventives contre les attaques XSS, CSRF, et les injections SQL. L'utilisation de try-catch ainsi que l'adoption de prepared statements est recommandée pour sécuriser les requêtes SQL. De plus, assurez-vous d'implémenter le hashage du mot de passe avec une fonction de salage pour renforcer la sécurité.

La fonctionnalité principale de l'application doit permettre à l'utilisateur de s'inscrire après vérification qu'il n'existe pas déjà dans la base de données. Avant l'inscription, il faut s'assurer que l'utilisateur respecte un format de mot de passe sécurisé, que son adresse email est correcte, et limiter l'utilisation de noms ou de prénoms trop longs.

Après inscription, l'utilisateur peut se connecter en fournissant son identifiant (email) et son mot de passe. La vérification de l'identifiant d'utilisateur et du mot de passe se fait de manière sécurisée en utilisant les méthodes appropriées. En cas de succès, l'utilisateur est redirigé vers une page dashboard.php où il pourra consulter les informations de son compte telles que son nom, prénom, adresse email, ainsi que son UID.

En termes de sécurité, assurez-vous également que le mot de passe respecte un format sécurisé en incluant des caractères spéciaux, des lettres majuscules et minuscules, ainsi que des chiffres. La vérification du format de l'adresse email doit suivre les standards et la longueur des noms et prénoms doit être limitée pour éviter tout dépassement de la capacité de la base de données.

La fonction d'inscription doit être conçue de manière à gérer ces vérifications avant d'ajouter un nouvel utilisateur à la base de données.

L'organisation des dossiers doit suivre la structure ci-dessous :

```
/esiea-web/webApp-FUNC/TP-02/
|-- templates/
|   |-- assets/
|   |   |-- css/
|   |   |   |-- style.css
|   |   |-- js/
|   |   |   |-- main.js
|   |-- parts/
|   |   |-- header.php
|   |-- dashboard.php
|   |-- home.php
|   |-- login.php
|   |-- register.php
|-- functions/
|   |-- database.php ( script de connexion à votre base de donnée )
|   |-- auth.php ( fonctions s'occupant de l'authentification et de l'inscription des utilisateurs )
|-- requestHandler.php ( fonctions qui s'occupe de faire le routage et la partie controller )
|-- index.php ( point d'entrée de l'application )
```

De plus, la création de la base de données doit suivre le schéma suivant :

```sql
CREATE DATABASE IF NOT EXISTS esieawebapp;

USE esieawebapp;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

**Cas de création d'un projet web fonctionnel :**

1. **Cahier des charges :**
    a. Descriptif du projet (Technique et fonctionnel)
    b. Public cible
    c. Charte graphique
    d. Arborescence du site
    e. Wireframe

2. **UML :**
    a. Diagramme UseCase : [Lien vers Lucidchart](https://www.lucidchart.com/pages/uml-use-case-diagram)
    b. Diagramme d'activité : [Lien vers Lucidchart](https://www.lucidchart.com/pages/fr/diagramme-dactivite-uml)
    c. Diagramme de flux (Système) : [Lien vers Lucidchart](https://www.lucidchart.com/pages/fr/diagramme-de-flux-de-donnees)
    d. Diagramme de séquence : [Lien vers Lucidchart](https://www.lucidchart.com/pages/fr/diagramme-de-sequence-uml)
    e. Diagramme entité-association ERD : [Lien vers Edrawsoft](https://www.edrawsoft.com/fr/what-is-entity-relationship-diagram-erd.html)

3. **Versioning :**
    a. Mise en place d'un repository GitHub pour assurer un versioning continu du projet.
    b. Phases de réalisation du projet avec le développement progressif des composants en backend en respectant les diagrammes conçus au préalable, ainsi que le cahier de charge.
    c. Tests tout au long du projet, incluant des tests fonctionnels, de sécurité, unitaires et de non-régression.

4. **Déploiement :**
    a. Mise en place d'un nom de domaine et d'un hébergement.
    b. Déploiement de l'application.

5. **Résolution :**
   2. **UML :** ( COUP DE POUCE ;-) )
      c. Diagramme de flux (Système)
      ![DiagrammeDeFluxWbeAppFuncPhp](https://github.com/yugmerabtene/ESIEA-WEB/assets/3670077/bf58869e-8552-4b39-9e37-2fc086f64d5f)
