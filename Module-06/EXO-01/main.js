// Acces au DOM en Javascript

// Selectionner un element par son ID
//let elementById = document.getElementById('section3');
// Selectionner un element par sa Classe
//let elementByClass = document.getElementsByClassName('section2');
//Selectionner un element par son Tag HTML ( nom de la balise )
//let elementByTag = document.getElementsByTagName('header'); 

// Manipulation du contenu avec JS
//elementById.textContent = "Nouveau Texte";
//elementById.innerHTML = '<strong> Hello Buddy</strong>';


// Acces au DOM avec Jquery 
// Selectionner un element par son ID
//let elementById = $('#section3');
// Selectionner un element par son nom de Classe
//let elementByClass = $('.section2');
// Selectionner un element par son Tag html
//let elementByTag = $('h1');

//Manipulation du contenu avec Jquery
//elementById.text('NOUVEAU TEXT QUI REPLACE La section3');
//elementById.html ('<strong>Manip HTML</strong>')

// -------- Gestion d'evenement 
// cibler l'element 
let elementById = document.getElementById('section3');
// Ajouter un ecouteur d'evenement
elementById.addEventListener('click', function(){
    alert('Element cliqué');
    }
);
// Modification du style css
elementById.style.color = 'green';



// fonctions Js
function additionner(a,b) {
    return a + b;
}
let resultat = additionner(4,5);
// Recuper la value d'un input html 
function getValue(){
    let input = document.getElementById('input').value;
    alert(input);
}









// creer un nouvelle element en JS
//let newElement = document.createElement('p');
//newElement.textContent = 'CONTENU POUR LE NOUVEL ELEMENT';
// append l'element dans le code html
//document.body.appendChild(newElement);
//document.body.removeChild(elementById);