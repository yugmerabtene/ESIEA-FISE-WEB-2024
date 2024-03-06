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