**Projet : Application PHP de Gestion d'Utilisateurs - TP-02**

## Objectif

Développer une application en PHP dédiée à la gestion d'utilisateurs selon le paradigme de la programmation fonctionnelle. Utilisation de MySQL en local pour stocker les données des utilisateurs. La table "utilisateurs" doit comporter les champs suivants : id (auto-incrément), nom, prénom, email, password. L'accent est mis sur la sécurité en implémentant des mesures préventives contre les attaques XSS, CSRF et les injections SQL. L'utilisation de try-catch et de prepared statements est fortement recommandée pour sécuriser les requêtes SQL. De plus, le mot de passe doit être hashé avec une fonction de salage. Intégrez des messages d'erreur génériques et des tests unitaires pour assurer la fiabilité du code.

## Sécurité

- Intégration de tests unitaires pour garantir la fiabilité du code.
- Utilisation de messages d'erreur génériques pour ne pas révéler d'informations sensibles en cas d'échec de connexion ou d'inscription.
- Gestion sécurisée des sessions en utilisant `session_start()` et `$_SESSION` pour stocker des informations de session.
- Imposition de politiques de mot de passe robustes, incluant une longueur minimale et l'utilisation de caractères spéciaux, de chiffres, etc.

## Fonctionnalités Principales

### 1. Inscription

- Vérification de l'absence préalable de l'utilisateur.
- Validation du format sécurisé du mot de passe.
- Validation du format correct de l'adresse email.
- Limite de la longueur des noms et prénoms.

### 2. Connexion

- Vérification sécurisée de l'identifiant (email) et du mot de passe.
- Redirection vers `dashboard.php` en cas de succès.

### 3. Dashboard

- Consultation des informations du compte (id, nom, prénom, adresse email).

## Technologies utilisées

**Backend :**
- PHP

**Frontend :**
- HTML5
- CSS3

**Base de Données :**
- MySQL

## Organisation des Dossiers

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
|   |-- database.php (script de connexion à la base de données)
|   |-- auth.php (fonctions d'authentification et d'inscription des utilisateurs)
|-- requestHandler.php (fonctions de routage et partie controller)
|-- index.php (point d'entrée de l'application)
```

## Base de Données

```sql
CREATE DATABASE IF NOT EXISTS esieawebapp;

USE esieawebapp;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prénom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
```

## Analyse et Conception

1. **UML :**
   - [Diagramme UseCase](https://www.lucidchart.com/pages/uml-use-case-diagram)
   - [Diagramme d'activité](https://www.lucidchart.com/pages/fr/diagramme-dactivite-uml)
   - [Diagramme de flux (Système)](https://www.lucidchart.com/pages/fr/diagramme-de-flux-de-donnees)
   - [Diagramme de séquence](https://www.lucidchart.com/pages/fr/diagramme-de-sequence-uml)
   - [Diagramme entité-association ERD](https://www.edrawsoft.com/fr/what-is-entity-relationship-diagram-erd.html)

2. **Résolution :**
   - Diagramme de flux (Système)
     ![Diagramme de Flux](https://github.com/yugmerabtene/ESIEA-WEB/assets/3670077/bf58869e-8552-4b39-9e37-2fc086f64d5f)

## Évaluation (sur 20)

| Critères                                        | Points |
|--------------------------------------------------|--------|
| **Implémentation des fonctionnalités demandées**  |        |
| Inscription (Vérification, Validation)           |   3    |
| Connexion (Vérification, Redirection)             |   3    |
| Dashboard (Consultation des informations)        |   3    |
| Messages d'erreur génériques                     |   2    |
| Gestion sécurisée des sessions                  |   2    |
| Politiques de mot de passe                      |   2    |
| **Sécurité**                                    |      |
| XSS                                             |   3    |
| CSRF                                            |   3    |
| INJECTION SQL                                   |   3    |
| **PHASE DE TESTS**                              |       |
| Tests unitaires                                 |   2    |
| Tests de sécurité                               |   1    |
| **Technologies utilisées**                       |      |
| Backend (Utilisation de PHP)                    |   1    |
| Frontend (Utilisation de HTML5, CSS3)            |   1    |
| Base de Données (MySQL)                         |   2    |
| **Organisation du Code**                         |      |
| Structure des dossiers et fichiers              |   2    |
| Cohérence de la base de données avec le code    |   2    |
| **Analyse et Conception**                        |      |
| Diagrammes UML (UseCase, Activité, Flux, Séquence, ERD) |   4    |

*Total : 20/20*
