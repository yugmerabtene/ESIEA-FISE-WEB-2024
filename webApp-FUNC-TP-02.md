**Projet : Application PHP de Gestion d'Utilisateurs**

**Objectif :**

Le projet consiste à développer une application en PHP, selon le paradigme de la programmation fonctionnelle, dédiée à la gestion d'utilisateurs avec une base de données MySQL en local. La table "utilisateurs" devra contenir les champs suivants : id (auto-incrément), nom, prénom, email, password. L'objectif principal est de garantir la sécurité de l'application en mettant en place des mesures préventives contre les attaques XSS, CSRF et les injections SQL. L'utilisation de try-catch et de prepared statements est recommandée pour sécuriser les requêtes SQL. De plus, le mot de passe doit être hashé avec une fonction de salage pour renforcer la sécurité. Des messages d'erreur génériques et des tests unitaires doivent être intégrés pour assurer la fiabilité du code.

**Sécurité :**
- Intégration de tests unitaires pour garantir la fiabilité du code.
- Utilisation de messages d'erreur génériques pour ne pas révéler d'informations sensibles en cas d'échec de connexion ou d'inscription.
- Gestion sécurisée des sessions en utilisant session_start() et $_SESSION pour stocker des informations de session.
- Imposition de politiques de mot de passe robustes, incluant une longueur minimale et l'utilisation de caractères spéciaux, de chiffres, etc.

**Fonctionnalités Principales :**

1. **Inscription :**
   - Vérification de l'absence préalable de l'utilisateur.
   - Validation du format sécurisé du mot de passe.
   - Validation du format correct de l'adresse email.
   - Limite de la longueur des noms et prénoms.

2. **Connexion :**
   - Vérification sécurisée de l'identifiant (email) et du mot de passe.
   - Redirection vers dashboard.php en cas de succès.

3. **Dashboard :**
   - Consultation des informations du compte (id,nom, prénom, adresse email).

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
|   |-- database.php (script de connexion à la base de données)
|   |-- auth.php (fonctions d'authentification et d'inscription des utilisateurs)
|-- requestHandler.php (fonctions de routage et partie controller)
|-- index.php (point d'entrée de l'application)
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
4. **Résolution :**
   2. **UML :**
      c. Diagramme de flux (Système)
      ![Diagramme de Flux](https://github.com/yugmerabtene/ESIEA-WEB/assets/3670077/bf58869e-8552-4b39-9e37-2fc086f64d5f)
