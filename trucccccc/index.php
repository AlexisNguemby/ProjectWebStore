<?php
// Inclure l'autoloader pour charger les classes automatiquement
require_once 'app/config/autoloader.php';

// Vérification des paramètres GET ou POST pour obtenir les informations de genre et catégorie
$gender_id = isset($_GET['gender_id']) ? (int)$_GET['gender_id'] : 1;  // Valeur par défaut : 1
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 2;  // Valeur par défaut : 2

// Créer une instance du contrôleur et appeler la méthode pour afficher les produits
use App\Controllers\ProductController;

$controller = new ProductController();
$controller->showProductsByGenderAndCategory($gender_id, $category_id);
