<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {

    // Méthode pour afficher les produits par genre et catégorie
    public function showProductsByGenderAndCategory($gender_id, $category_id) {
        // Appeler la méthode du modèle pour récupérer les produits
        $products = Product::getByGenderAndCategory($gender_id, $category_id);

        // Vérifier si des produits ont été trouvés
        if ($products) {
            // Passer les produits à la vue
            include_once __DIR__ . '/../views/products/products_list.php'; // Nouveau chemin vers la vue
        } else {
            echo "Aucun produit trouvé.";
        }
    }
}
