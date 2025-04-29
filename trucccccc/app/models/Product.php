<?php
namespace App\Models;

use App\Config\Database;

class Product {

    // Méthode pour récupérer les produits selon le genre et la catégorie
    public static function getByGenderAndCategory($gender_id, $category_id) {
        // Se connecter à la base de données
        $db = new Database();
        $pdo = $db->connect();

        // Préparer la requête SQL avec les paramètres
        $stmt = $pdo->prepare("SELECT * FROM products WHERE gender_id = :gender_id AND category_id = :category_id");

        // Lier les paramètres à la requête SQL
        $stmt->bindParam(':gender_id', $gender_id, \PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, \PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();

        // Récupérer les résultats sous forme de tableau associatif
        return $stmt->fetchAll();
    }
}
