<?php
// routeur.php

// Charge le fichier de configuration, de routage et autres fichiers nécessaires
require_once 'config.php';
require_once 'controllers/MonControleur.php';

// Classe Router
class Router {
    private $routes = [];

    // Enregistre les routes
    public function addRoute($method, $route, $controllerMethod) {
        $this->routes[] = [
            'method' => strtoupper($method), // Convertir la méthode en majuscule
            'route' => $route,
            'controllerMethod' => $controllerMethod
        ];
    }

    // Trouve la route correspondant à la requête
    public function routeRequest($url, $method) {
        foreach ($this->routes as $route) {
            // Vérifie si la méthode et l'URL correspondent
            if ($route['method'] === strtoupper($method) && $url === $route['route']) {
                return $route['controllerMethod'];
            }
        }

        // Si aucune route n'a été trouvée, renvoyer une erreur
        header("HTTP/1.1 404 Not Found");
        echo json_encode(["message" => "Route not found"]);
        exit;
    }
}

// Instanciation du routeur
$router = new Router();

// Ajout de routes (par exemple)
$router->addRoute('GET', '/produits', 'MonControleur::getProduits');
$router->addRoute('POST', '/ajouter-produit', 'MonControleur::ajouterProduit');
$router->addRoute('PUT', '/mettre-a-jour-produit', 'MonControleur::mettreAJourProduit');
$router->addRoute('DELETE', '/supprimer-produit', 'MonControleur::supprimerProduit');

// Récupère l'URL et la méthode de la requête
$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Traite la requête
$controllerMethod = $router->routeRequest($url, $method);

// Appelle la méthode du contrôleur associée à la route
list($controller, $method) = explode('::', $controllerMethod);
$controllerInstance = new $controller();
$controllerInstance->$method();
