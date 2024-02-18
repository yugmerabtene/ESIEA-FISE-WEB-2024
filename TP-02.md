**Énoncé :**

Créez une application PHP simple de gestion d'utilisateurs avec une base de données MySQL en local. La table "utilisateur" doit avoir les champs suivants : id, nom, prenom, email, password. Assurez-vous de mettre en place des mesures de sécurité telles que la prévention contre les attaques XSS, CSRF, et injection SQL. Utilisez des try-catch et des prepared statements pour sécuriser les requêtes SQL, ainsi que le hashage du mot de passe avec une fonction de salage.

Permettez à l'utilisateur de s'inscrire  et et de se connecter, et d'etre redirgier apres une connexion valide vers un tableau de bord dashboard.php pour pouvoir visualiser ses informations personnelles.
Si l'utilisateur n'est pas trouvé, interceptez l'erreur par mesure de sécurité et affichez un message, par exemple : "UserNotFound". Ajoutez également la fonctionnalité de déconnexion sécurisée.

Organisez vos dossiers de la manière suivante :
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
|   |-- Database.php
|   |-- User.php
|   |-- Auth.php
|-- requestHandler.php
|-- index.php

```

```
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
