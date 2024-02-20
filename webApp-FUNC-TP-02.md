** Application PHP de Gestion d'Utilisateurs**

**Objectif du Projet :**

Ce projet vise à développer une application en PHP en programmation fonctionnelle, permettant la gestion d'utilisateurs avec une base de données MySQL en local. La table "utilisateurs" doit comporter les champs suivants : id (auto-incrément), nom, prénom, email, password. L'objectif est d'assurer la sécurité de l'application en mettant en place des mesures préventives contre les attaques XSS, CSRF, et les injections SQL. Les try-catch et les prepared statements sont recommandés pour sécuriser les requêtes SQL. De plus, le mot de passe doit être hashé avec une fonction de salage pour renforcer la sécurité.

**Fonctionnalités Principales :**

1. **Inscription :**
   - Vérification de la non-existence préalable de l'utilisateur.
   - Validation du format sécurisé du mot de passe.
   - Validation du format correct de l'adresse email.
   - Limite de la longueur des noms et prénoms.

2. **Connexion :**
   - Vérification sécurisée de l'identifiant (email) et du mot de passe.
   - Redirection vers dashboard.php en cas de succès.

3. **Dashboard :**
   - Consultation des informations du compte (nom, prénom, adresse email, UID).

**Organisation des Dossiers :**

```plaintext
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
|   |-- database.php ( script de connexion à votre base de données )
|   |-- auth.php ( fonctions s'occupant de l'authentification et de l'inscription des utilisateurs )
|-- requestHandler.php ( fonctions qui s'occupe de faire le routage et la partie controller )
|-- index.php ( point d'entrée de l'application )
```

**Base de Données :**

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

**Cas de Création d'un Projet Web Fonctionnel :**

1. **Cahier des Charges :**
   a. Descriptif du projet (Technique et fonctionnel)
   b. Public cible
   c. Charte graphique
   d. Arborescence du site
   e. Wireframe

2. **UML :**
   a. [Diagramme UseCase](https://www.lucidchart.com/pages/uml-use-case-diagram)
   b. [Diagramme d'activité](https://www.lucidchart.com/pages/fr/diagramme-dactivite-uml)
   c. [Diagramme de flux (Système)](https://www.lucidchart.com/pages/fr/diagramme-de-flux-de-donnees)
   d. [Diagramme de séquence](https://www.lucidchart.com/pages/fr/diagramme-de-sequence-uml)
   e. [Diagramme entité-association ERD](https://www.edrawsoft.com/fr/what-is-entity-relationship-diagram-erd.html)

3. **Versioning :**
   a. Mise en place d'un repository GitHub pour assurer un versioning continu du projet.
   b. Phases de réalisation du projet avec le développement progressif des composants en backend en respectant les diagrammes conçus au préalable, ainsi que le cahier de charge.
   c. Tests tout au long du projet, incluant des tests fonctionnels, de sécurité, unitaires et de non-régression.

4. **Déploiement :**
   a. Mise en place d'un nom de domaine et d'un hébergement.
   b. Déploiement de l'application.

5. **Résolution :**
   2. **UML :**
      c. Diagramme de flux (Système)
      ![Diagramme de Flux](https://github.com/yugmerabtene/ESIEA-WEB/assets/3670077/bf58869e-8552-4b39-9e37-2fc086f64d5f)
