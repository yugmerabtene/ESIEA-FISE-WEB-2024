## Syllabus JavaScript DOM et jQuery avec l'API BAN

### Module 1: Introduction au DOM

#### 1.1 Qu'est-ce que le DOM ?
   - Le DOM (Document Object Model) représente la structure d'une page HTML sous forme d'arbre d'objets.
   - Il permet la manipulation dynamique de la structure, du style et du contenu d'une page.

#### 1.2 Accès au DOM avec JavaScript
   - Utilisation de `document` pour accéder au DOM.
   - Sélection d'éléments par ID, classe, balise.

   ```javascript
   // JavaScript
   let elementById = document.getElementById('monElementId');
   let elementsByClass = document.getElementsByClassName('maClasse');
   let elementsByTag = document.getElementsByTagName('div');
   ```

#### 1.3 Manipulation du contenu avec JavaScript
   - Modification du texte et du HTML d'un élément.
   - Ajout et suppression d'éléments.

   ```javascript
   // JavaScript
   elementById.textContent = 'Nouveau texte';
   elementById.innerHTML = '<strong>Nouveau texte en gras</strong>';

   let newElement = document.createElement('p');
   newElement.textContent = 'Contenu du nouvel élément';

   document.body.appendChild(newElement);
   document.body.removeChild(elementById);
   ```

#### 1.4 Accès au DOM avec jQuery
   - Sélection d'éléments par ID, classe, balise.

   ```javascript
   // jQuery
   let elementById = $('#monElementId');
   let elementsByClass = $('.maClasse');
   let elementsByTag = $('div');
   ```

#### 1.5 Manipulation du contenu avec jQuery
   - Modification du texte et du HTML d'un élément.
   - Ajout et suppression d'éléments.

   ```javascript
   // jQuery
   elementById.text('Nouveau texte');
   elementById.html('<strong>Nouveau texte en gras</strong>');

   let newElement = $('<p>').text('Contenu du nouvel élément');
   $('body').append(newElement);
   elementById.remove();
   ```

#### Exercices
   - Sélectionnez un élément par ID avec JavaScript et changez son texte, puis faites de même avec jQuery.
   - Créez un nouvel élément et ajoutez-le à la page avec JavaScript, puis faites de même avec jQuery.

### Module 2: Événements et gestionnaires d'événements

#### 2.1 Introduction aux événements
   - Types d'événements (clic, survol, etc.).
   - Attribution d'événements via JavaScript.

   ```javascript
   // JavaScript
   elementById.addEventListener('click', function() {
       alert('Élément cliqué !');
   });
   ```

#### 2.2 Gestionnaires d'événements
   - Utilisation de `addEventListener`.
   - Fonctions de gestion d'événements.

   ```javascript
   // JavaScript
   function handleClick() {
       alert('Élément cliqué !');
   }

   elementById.addEventListener('click', handleClick);
   ```

#### 2.3 Événements de formulaire
   - Validation de formulaire.
   - Soumission de formulaire.

   ```javascript
   // JavaScript
   document.getElementById('monFormulaire').addEventListener('submit', function(event) {
       event.preventDefault();
       // Effectuez vos actions de validation ici
   });
   ```

#### 2.4 Événements avec jQuery
   - Attribution d'événements avec jQuery.

   ```javascript
   // jQuery
   elementById.on('click', function() {
       alert('Élément cliqué !');
   });
   ```

#### Exercices
   - Créez un bouton qui affiche une alerte lorsqu'il est cliqué avec JavaScript, puis faites de même avec jQuery.
   - Validez un formulaire en utilisant JavaScript, puis faites de même avec jQuery.

### Module 3: Manipulation du style et des classes

#### 3.1 Modification du style
   - Changement de propriétés CSS.
   - Animation avec JavaScript.

   ```javascript
   // JavaScript
   elementById.style.color = 'red';

   // Animation avec classe CSS
   elementById.classList.add('animate');
   ```

#### 3.2 Manipulation des classes
   - Ajout et suppression de classes.
   - Toggle de classes.

   ```javascript
   // JavaScript
   elementById.classList.add('maNouvelleClasse');
   elementById.classList.remove('ancienneClasse');
   elementById.classList.toggle('toggleClasse');
   ```

#### 3.3 Modification du style et des classes avec jQuery
   - Changement de propriétés CSS.
   - Ajout et suppression de classes.

   ```javascript
   // jQuery
   elementById.css('color', 'red');
   elementById.addClass('animate');
   ```

#### Exercices
   - Animez un élément lorsqu'un bouton est cliqué avec JavaScript, puis faites de même avec jQuery.
   - Changez la couleur d'un élément en utilisant des classes avec JavaScript, puis faites de même avec jQuery.

### Module 4: Traverser et manipuler la structure

#### 4.1 Traverser les éléments
   - Parcours des éléments parents, enfants et frères.
   - Utilisation de `parentNode`, `childNodes`, `nextSibling`, etc.

   ```javascript
   // JavaScript
   let parentElement = elementById.parentNode;
   let childElements = elementById.childNodes;
   let nextSibling = elementById.nextSibling;
   ```

#### 4.2 Manipulation de l'arbre DOM
   - Clonage d'éléments.
   - Suppression d'éléments.

   ```javascript
   // JavaScript
   let clonedElement = elementById.cloneNode(true);
   document.body.removeChild(elementById);
   ```

#### 4.3 Traverser les éléments avec jQuery
   - Parcours des éléments parents, enfants et frères.

   ```javascript
   // jQuery
   let parentElement = elementById.parent();
   let childElements = elementById.children();
   let nextSibling = elementById.next();
   ```

#### 4.4 Manipulation de l'arbre DOM avec jQuery
   - Clonage d'éléments.
   - Suppression d'éléments.

   ```javascript
   // jQuery
   let clonedElement = elementById.clone();
   elementById.remove();
   ```

#### Exercice intégré : Intégration de l'API BAN dans un input adresse

##### Objectif
   - Créer une interface utilisateur qui, lorsqu'un utilisateur saisit une adresse dans un champ de texte, utilise l'API BAN pour récupérer des suggestions d'ad

resses et les affiche à l'utilisateur.

##### Instructions

1. **Création de l'interface HTML**
   - Créez un champ de texte (`input`) pour que l'utilisateur saisisse une adresse.
   - Ajoutez un élément (`ul` ou `div`) pour afficher les suggestions d'adresses.

   ```html
   <!-- HTML -->
   <input type="text" id="adresseInput" placeholder="Saisissez une adresse">
   <ul id="suggestionsList"></ul>
   ```

2. **Récupération des suggestions avec JavaScript**
   - Utilisez JavaScript pour détecter les changements dans le champ de texte.
   - À chaque changement, appelez l'API BAN pour obtenir des suggestions d'adresses.

   ```javascript
   // JavaScript
   const adresseInput = document.getElementById('adresseInput');
   const suggestionsList = document.getElementById('suggestionsList');

   adresseInput.addEventListener('input', function() {
       const inputValue = adresseInput.value;

       // Utilisez l'API BAN pour récupérer les suggestions en fonction de inputValue
       // Exemple d'URL de l'API BAN : https://api-adresse.data.gouv.fr/search/?q=${inputValue}
       // Vous pouvez utiliser fetch() ou une bibliothèque comme axios pour faire la requête.

       // Ensuite, traitez la réponse de l'API et affichez les suggestions.
       fetch(`https://api-adresse.data.gouv.fr/search/?q=${inputValue}`)
           .then(response => response.json())
           .then(data => {
               const suggestions = data.features;
               afficherSuggestions(suggestions);
           })
           .catch(error => console.error('Erreur lors de la récupération des suggestions:', error));
   });

   function afficherSuggestions(suggestions) {
       suggestionsList.innerHTML = ''; // Efface les anciennes suggestions

       suggestions.forEach(suggestion => {
           const li = document.createElement('li');
           li.textContent = suggestion.properties.label;
           suggestionsList.appendChild(li);
       });
   }
   ```

3. **Intégration de jQuery (optionnel)**
   - Si vous préférez utiliser jQuery, vous pouvez également effectuer ces opérations avec jQuery.

   ```javascript
   // jQuery
   $(document).ready(function() {
       $('#adresseInput').on('input', function() {
           const inputValue = $(this).val();

           // Utilisez l'API BAN avec $.ajax() pour récupérer les suggestions.

           // Ensuite, traitez la réponse de l'API et affichez les suggestions.
           $.ajax({
               url: `https://api-adresse.data.gouv.fr/search/?q=${inputValue}`,
               method: 'GET',
               dataType: 'json',
               success: function(data) {
                   const suggestions = data.features;
                   afficherSuggestions(suggestions);
               },
               error: function(error) {
                   console.error('Erreur lors de la récupération des suggestions:', error);
               }
           });
       });
   });
   ```

---
