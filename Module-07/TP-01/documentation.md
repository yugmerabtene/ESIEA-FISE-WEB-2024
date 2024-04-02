- /app
  - /controllers
    - UserController.php
    - AuthController.php
    - AdminController.php
  - /models
    - User.php    
  - /views
    - /user
      - register.php
      - login.php
      - dashboard.php
      - delete.php
    - /admin
      - manage_users.php
      - manage_roles.php
  - /services
    - AuthService.php
    - UserService.php
    - AdminService.php
- /config
  - config.php
- /public
  - /css
    - style.css
  - /js
    - script.js
  - /img
- /vendor
  - [composer dependencies]
- /tests
- /docs
- index.php


DB : 

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    adresse VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(10) NOT NULL
);
