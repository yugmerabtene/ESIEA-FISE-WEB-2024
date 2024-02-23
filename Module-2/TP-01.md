**Énoncé**

Travaux pratiques à rendre pour le prochain cours :

1. Créez un système de vérification d'utilisateur à partir d'un input HTML.
2. Élaborez une fonction en PHP qui gère la vérification des utilisateurs préalablement enregistrés dans un tableau, avec une information du type métier. Si un utilisateur est trouvé, affichez ses     informations personnelles. Sinon, interceptez l'erreur par mesure de sécurité et affichez un message, exemple : "UserNotFound".
3. Sécurisez le formulaire contre les attaques XSS.
4. Organisez vos dossiers de la manière suivante :

```plaintext
|-- index.php (point d'entrée de l'application)
|-- functions.php (gère tout le backend de votre application)
|-- requestHandler.php (gère les requêtes)
|-- templates (frontend de votre application)
|   |-- parts
|       |-- header.php
|       |-- footer.php
|   |-- assets
|       |-- css
|           |-- style.css
|       |-- js
|           |-- main.js
|       |-- fonts
|           |-- UneTypoGoogleDeVotreChoix.ttf
|       |-- img
|           |-- logo.png
```

Si vous avez un problème de chemin relatif dans vos appels :
```html
<script src="./templates/assets/js/main.js"></script> ;-)
```
