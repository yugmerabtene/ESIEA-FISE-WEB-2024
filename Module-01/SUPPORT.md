# Module-01: Fondamentaux du Web

## Introduction:
Dans ce module, nous allons explorer les fondamentaux du développement web, en nous concentrant sur HTML5, CSS3, Grid et Flexbox. Nous allons utiliser ces technologies pour créer un site onePage responsive.

### Ressources:
- [W3Schools - HTML5 Tutorial](https://www.w3schools.com/html/default.asp)
- [W3Schools - CSS Tutorial](https://www.w3schools.com/css/default.asp)
- [W3Schools - CSS Grid Tutorial](https://www.w3schools.com/css/css_grid.asp)
- [W3Schools - CSS Flexbox Tutorial](https://www.w3schools.com/css/css3_flexbox.asp)
- [Mozilla Developer Network (MDN) - HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
- [Mozilla Developer Network (MDN) - CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
- [Mozilla Developer Network (MDN) - CSS Grid Layout](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout)
- [Mozilla Developer Network (MDN) - CSS Flexible Box Layout](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout)

## HTML5:
HTML (HyperText Markup Language) est la structure de base d'une page web. HTML5 est la dernière version de HTML avec de nouvelles fonctionnalités et améliorations.

### Exemple de code HTML5:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My One Page Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#section1">Section 1</a></li>
            <li><a href="#section2">Section 2</a></li>
            <li><a href="#section3">Section 3</a></li>
        </ul>
    </nav>
    <section id="section1">
        <h2>Section 1</h2>
        <p>This is the content of section 1.</p>
    </section>
    <section id="section2">
        <h2>Section 2</h2>
        <p>This is the content of section 2.</p>
    </section>
    <section id="section3">
        <h2>Section 3</h2>
        <p>This is the content of section 3.</p>
    </section>
    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>
</body>
</html>
```

## CSS3:
CSS (Cascading Style Sheets) est utilisé pour styliser et mettre en forme le contenu HTML. CSS3 est la dernière version de CSS avec des fonctionnalités avancées.

### Exemple de code CSS3:

```css
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

section {
    padding: 50px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}
```

## CSS Grid:
CSS Grid Layout permet de créer des mises en page complexes et flexibles en utilisant des lignes et des colonnes.

### Exemple de code CSS Grid:

```css
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: auto;
    grid-gap: 20px;
}

header {
    grid-column: 1 / -1;
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

nav {
    grid-column: 1 / -1;
    text-align: center;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

section {
    padding: 50px;
    background-color: #f4f4f4;
}

footer {
    grid-column: 1 / -1;
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}
```

## CSS Flexbox:
CSS Flexible Box Layout (Flexbox) est utilisé pour disposer les éléments d'une manière flexible et efficace.

### Exemple de code CSS Flexbox:

```css
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

header, footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

nav {
    text-align: center;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

section {
    padding: 50px;
    background-color: #f4f4f4;
    flex-grow: 1;
}
```

## Réalisation d'un Site OnePage Responsive:
Maintenant, en utilisant les concepts que nous avons couverts jusqu'à présent, nous pouvons réaliser un site onePage responsive qui s'adapte à différents appareils et tailles d'écran.

### Exemple de structure HTML:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My One Page Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#section1">Section 1</a></li>
            <li><a```html
 href="#section2">Section 2</a></li>
            <li><a href="#section3">Section 3</a></li>
        </ul>
    </nav>
    <section id="section1">
        <h2>Section 1</h2>
        <p>This is the content of section 1.</p>
    </section>
    <section id="section2">
        <h2>Section 2</h2>
        <p>This is the content of section 2.</p>
    </section>
    <section id="section3">
        <h2>Section 3</h2>
        <p>This is the content of section 3.</p>
    </section>
    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>
</body>
</html>
```

### Exemple de styles CSS:

```css
/* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

header, footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

nav {
    text-align: center;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
}

section {
    padding: 50px;
    background-color: #f4f4f4;
    flex-grow: 1;
}
```

