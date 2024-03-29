// acces au dom 

// Selectionner un element par son ID 
//let elementById = document.getElementById('section2');
// Selectionner un element par sa classe
//let elementByClass = document.getElementsByClassName('section1');
//Selectionner un element àa parti de son tag html (Nom de balise)
//let elementByTag = document.getElementsByTagName('h1');

// Manipuler du contenu en Javascript

//elementById.textContent = "NOUVEAU TEXT";
//elementById.innerHTML = '<strong>Hello World</strong>';

// ajouter un ecouteur d'evenement EventListner
//elementById.addEventListener('click', function(){
//    alert('Element a été cliqué');
//});

// Modification du Style CSS d'un element

//elementById.style.color = 'green';

// Fonction en JS
//function additioner(a,b){
// return a+b;
//}
//let result = additionner (3,4);
// recuperer la valeur de l'input et l'afficher
function getValue(){
    let input = document.getElementById("input").value;
    // return la valeur 
    alert(input);
}
