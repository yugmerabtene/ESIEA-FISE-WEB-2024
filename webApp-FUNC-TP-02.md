**Énoncé corrigé et amélioré :**

**Création d'une application PHP de gestion d'utilisateurs avec une base de données MySQL en local :**

L'objectif de ce projet est de développer une application en PHP en programmation fonctionnelle, permettant la gestion d'utilisateurs avec une base de données MySQL en local. La table "utilisateurs" devra comporter les champs suivants : id (sera AI : auto-increment), nom, prénom, email, password. Pour garantir la sécurité de l'application, il est impératif de mettre en place des mesures préventives contre les attaques XSS, CSRF et les injections SQL. L'utilisation de try-catch ainsi que l'adoption de prepared statements est recommandée pour sécuriser les requêtes SQL. De plus, assurez-vous d'implémenter le hashage du mot de passe ( en plus une fonction Salt "salage" vous fera gagner des points en plus ).

La fonctionnalité principale de l'application devra permettre à l'utilisateur de s'inscrire et de se connecter. Une fois connecté avec succès, l'utilisateur sera redirigé vers un tableau de bord (dashboard.php) où il pourra visualiser ses informations personnelles. En cas de non-reconnaissance de l'utilisateur, interceptez l'erreur par mesure de sécurité et affichez un message explicite, tel que "UserNotFound". Ajoutez également la fonctionnalité de déconnexion pour garantir une expérience utilisateur complète.

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
|   |-- dashboard/
|   |   |-- user_info.php
|   |-- home.php
|   |-- login_form.php
|   |-- register_form.php
|-- functions/
|   |-- database.php
|   |-- user.php
|   |-- auth.php
|-- requestHandler.php
|-- index.php
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
    b. Phases de réalisation du projet avec le développement progressif des composants en backend en respectant les diagrammes conçu au préalable, ainsi que le cahier de charge.
    c. Tests tout au long du projet, incluant des tests fonctionnels, de sécurité, unitaires et de non-régression.

4. **Déploiement :**
    a. Mise en place d'un nom de domaine et d'un hébergement.
    b. Déploiement de l'application.
