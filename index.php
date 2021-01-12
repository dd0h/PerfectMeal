<?php

require __DIR__ .'/src/routing/Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::init(new RouteCollection());

Router::route('', 'DefaultController', '', 'GET');
Router::route('login', 'DefaultController', 'login', 'GET');
Router::route('register', 'DefaultController', 'register', 'GET');
Router::route('addRecipe', 'DefaultController', 'addRecipe', 'GET');

Router::route('login', 'SecurityController', 'login', 'POST');
Router::route('logout', 'SecurityController', 'logout', 'POST');
Router::route('register', 'SecurityController', 'register', 'POST');

Router::route('addRecipe', 'RecipeController', 'addRecipe', 'POST');
Router::route('viewRecipe', 'RecipeController', 'viewRecipe', 'GET');
Router::route('searchRecipe', 'RecipeController', 'getRecipes', 'GET');



AuthenticationGuard::protect(["addRecipe"]);

Router::run($path);