
---

### Cours sur PHP Orienté Objet (POO) et Modèle-Vue-Contrôleur (MVC)

#### Introduction à PHP Orienté Objet (POO) :

PHP est un langage de programmation largement utilisé pour le développement web. Dans sa version orientée objet, PHP permet une organisation plus structurée et modulaire du code, favorisant la réutilisabilité et la maintenance. Voici les principaux concepts de la programmation orientée objet en PHP :

1. **Classes et Objets** :
   - Une classe est un modèle pour créer des objets. Elle définit les propriétés et les méthodes communes à tous les objets de ce type.
   - Un objet est une instance d'une classe, créée à partir du mot-clé `new`. Chaque objet possède ses propres valeurs pour les propriétés définies dans la classe.

Exemple de déclaration de classe et d'instanciation d'objet en PHP :

```php
class Personne {
    // Propriétés
    public $nom;
    public $age;
    
    // Méthode
    public function sePresenter() {
        echo "Je m'appelle $this->nom et j'ai $this->age ans.";
    }
}

// Instanciation d'un objet
$personne1 = new Personne();
$personne1->nom = "Jean";
$personne1->age = 30;

// Appel de méthode
$personne1->sePresenter(); // Affiche : Je m'appelle Jean et j'ai 30 ans.
```

2. **Encapsulation** :
   - L'encapsulation est le fait de regrouper les données et les méthodes qui agissent sur ces données dans une même entité, une classe.
   - En PHP, l'encapsulation est réalisée en déclarant les propriétés et les méthodes avec des modificateurs d'accès (`public`, `protected`, `private`).

Exemple d'encapsulation en PHP :

```php
class CompteBancaire {
    private $solde;

    public function __construct($soldeInitial) {
        $this->solde = $soldeInitial;
    }

    public function deposer($montant) {
        $this->solde += $montant;
    }

    public function retirer($montant) {
        if ($montant <= $this->solde) {
            $this->solde -= $montant;
        } else {
            echo "Solde insuffisant.";
        }
    }

    public function getSolde() {
        return $this->solde;
    }
}

$compte = new CompteBancaire(1000);
$compte->deposer(500);
$compte->retirer(200);
echo "Solde : " . $compte->getSolde(); // Affiche : Solde : 1300
```

3. **Héritage** :
   - L'héritage permet à une classe d'hériter des propriétés et des méthodes d'une autre classe appelée classe parente ou classe de base.
   - En PHP, une classe peut hériter d'une seule classe parente, mais peut implémenter plusieurs interfaces.

Exemple d'héritage en PHP :

```php
class Employe {
    protected $nom;
    protected $salaire;

    public function __construct($nom, $salaire) {
        $this->nom = $nom;
        $this->salaire = $salaire;
    }

    public function travailler() {
        echo "$this->nom travaille.";
    }
}

class Manager extends Employe {
    private $equipe;

    public function __construct($nom, $salaire, $equipe) {
        parent::__construct($nom, $salaire);
        $this->equipe = $equipe;
    }

    public function gererEquipe() {
        echo "$this->nom gère l'équipe : $this->equipe";
    }
}

$manager = new Manager("Alice", 5000, "Développeurs");
$manager->travailler(); // Affiche : Alice travaille.
$manager->gererEquipe(); // Affiche : Alice gère l'équipe : Développeurs
```

4. **Polymorphisme** :
   - Le polymorphisme permet à une méthode d'agir différemment en fonction du contexte, notamment grâce à la redéfinition de méthodes dans les classes dérivées.
   - En PHP, le polymorphisme est souvent utilisé avec les méthodes `override` et `overload`.

Exemple de polymorphisme en PHP :

```php
class Animal {
    public function parler() {
        echo "L'animal parle.";
    }
}

class Chien extends Animal {
    public function parler() {
        echo "Le chien aboie.";
    }
}

class Chat extends Animal {
    public function parler() {
        echo "Le chat miaule.";
    }
}

$animal = new Animal();
$chien = new Chien();
$chat = new Chat();

$animal->parler(); // Affiche : L'animal parle.
$chien->parler(); // Affiche : Le chien aboie.
$chat->parler(); // Affiche : Le chat miaule.
```

---

#### Introduction au Modèle-Vue-Contrôleur (MVC) :

Le modèle-vue-contrôleur (MVC) est un pattern d'architecture logicielle largement utilisé dans le développement web pour séparer la logique métier, la présentation et la gestion des interactions. Voici les trois composants principaux du modèle MVC :

1. **Modèle** :
   - Le modèle représente la couche de données de l'application. Il gère l'accès aux données, leur manipulation et leur validation.
   - En PHP, les classes de modèle sont souvent utilisées pour interagir avec la base de données et effectuer des opérations CRUD (Create, Read, Update, Delete) sur les données.

Exemple de classe modèle en PHP :

```php
class UtilisateurModel {
    public function recupererUtilisateurParId($id) {
        // Code pour récupérer un utilisateur depuis la base de données
    }

    public function enregistrerUtilisateur($donnees) {
        // Code pour enregistrer un utilisateur dans la base de données
    }

    public function supprimerUtilisateur($id) {
        // Code pour supprimer un utilisateur de la base de données
    }
}
```

2. **Vue** :
   - La vue est responsable de l'affichage des données à l'utilisateur. Elle présente les informations de manière structurée et esthétique.
   - En PHP, les vues sont généralement des fichiers contenant du code HTML avec des balises spéciales pour insérer des données dynamiques.

Exemple de vue en PHP :

```php


<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <li><?= $utilisateur->nom ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```

3. **Contrôleur** :
   - Le contrôleur agit comme un intermédiaire entre le modèle et la vue. Il reçoit les requêtes de l'utilisateur, traite les données nécessaires en faisant appel aux classes de modèle, puis sélectionne la vue appropriée pour afficher les résultats.
   - En PHP, les contrôleurs sont généralement des classes qui définissent des méthodes correspondant à différentes actions de l'application.

Exemple de contrôleur en PHP :

```php
class UtilisateurController {
    public function afficherListe() {
        $utilisateurModel = new UtilisateurModel();
        $utilisateurs = $utilisateurModel->recupererTousUtilisateurs();
        include 'vue/liste_utilisateurs.php';
    }

    public function afficherDetails($id) {
        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->recupererUtilisateurParId($id);
        include 'vue/details_utilisateur.php';
    }
}
```

---

#### Application du Modèle-Vue-Contrôleur (MVC) en PHP :

Maintenant que nous avons vu les principes de base de la POO et du MVC en PHP, nous pouvons les appliquer à la création d'une application web de gestion d'utilisateurs. Voici les étapes générales pour cela :

1. **Analyse des besoins** :
   - Identifier les fonctionnalités attendues de l'application, telles que l'inscription, la connexion, la mise à jour des informations utilisateur, etc.
   - Documenter les spécifications fonctionnelles et techniques.

2. **Conception de l'architecture** :
   - Créer un diagramme UML pour représenter les différentes classes, leurs relations et les flux d'exécution de l'application.
   - Définir la structure de répertoire MVC pour organiser les fichiers de manière logique.

3. **Implémentation du Modèle** :
   - Créer les classes de modèle pour interagir avec la base de données et effectuer des opérations CRUD sur les données utilisateur.

4. **Implémentation de la Vue** :
   - Créer les fichiers de vue pour afficher les interfaces utilisateur, en utilisant des balises PHP pour insérer des données dynamiques.

5. **Implémentation du Contrôleur** :
   - Créer les classes de contrôleur pour traiter les requêtes de l'utilisateur, appeler les méthodes appropriées du modèle et sélectionner la vue correspondante.

6. **Intégration avec la Base de Données** :
   - Créer la structure de la base de données MySQL en utilisant le schéma défini dans la conception.
   - Établir une connexion à la base de données depuis PHP et effectuer les opérations nécessaires (lecture, écriture, mise à jour, suppression).

7. **Tests et Débogage** :
   - Effectuer des tests unitaires et fonctionnels pour chaque fonctionnalité de l'application.
   - Déboguer les erreurs et les bogues éventuels pour assurer le bon fonctionnement de l'application.

8. **Documentation et Présentation** :
   - Documenter le code source de l'application pour expliquer son fonctionnement, son architecture et ses spécifications.
   - Préparer une présentation pour démontrer l'application et expliquer sa conception et son utilisation.

---

**Exemple simple d'une application en MVC**  

1. **Autoloader (Autoloader.php)** :
```php
<?php
class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            $file = __DIR__ . '/' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
            return false;
        });
    }
}
?>
```

2. **Modèle (UtilisateurModel.php)** :
```php
<?php
class UtilisateurModel {
    public function recupererTousUtilisateurs() {
        // Code pour récupérer tous les utilisateurs depuis la base de données
        // Cet exemple suppose l'utilisation d'une base de données fictive
        return [
            (object) ['id' => 1, 'nom' => 'Jean', 'email' => 'jean@example.com'],
            (object) ['id' => 2, 'nom' => 'Marie', 'email' => 'marie@example.com'],
            (object) ['id' => 3, 'nom' => 'Pierre', 'email' => 'pierre@example.com']
        ];
    }

    public function recupererUtilisateurParId($id) {
        // Code pour récupérer un utilisateur par son ID depuis la base de données
        // Cet exemple suppose l'utilisation d'une base de données fictive
        $utilisateurs = $this->recupererTousUtilisateurs();
        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur->id == $id) {
                return $utilisateur;
            }
        }
        return null;
    }
}
?>
```

3. **Vue (liste_utilisateurs.php)** :
```php
<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>
    <ul>
        <?php foreach ($utilisateurs as $utilisateur): ?>
            <li><?= $utilisateur->nom ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```

4. **Contrôleur (UtilisateurController.php)** :
```php
<?php
class UtilisateurController {
    public function afficherListe() {
        $utilisateurModel = new UtilisateurModel();
        $utilisateurs = $utilisateurModel->recupererTousUtilisateurs();
        include 'liste_utilisateurs.php';
    }

    public function afficherDetails($id) {
        $utilisateurModel = new UtilisateurModel();
        $utilisateur = $utilisateurModel->recupererUtilisateurParId($id);
        if ($utilisateur) {
            echo "Nom : " . $utilisateur->nom . "<br>";
            echo "Email : " . $utilisateur->email . "<br>";
        } else {
            echo "Utilisateur non trouvé.";
        }
    }
}
?>
```

5. **Index (index.php)** :
```php
<?php
// Inclusion de l'autoloader
require_once 'Autoloader.php';
Autoloader::register();

// Instanciation du contrôleur
$utilisateurController = new UtilisateurController();

// Affichage de la liste des utilisateurs
$utilisateurController->afficherListe();

// Affichage des détails d'un utilisateur
echo "<h2>Détails de l'utilisateur avec l'ID 2 :</h2>";
$utilisateurController->afficherDetails(2);
?>
```

