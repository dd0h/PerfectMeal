<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('viewRecipe', 'DefaultController');
Router::get('addRecipe', 'DefaultController');
Router::get('searchRecipe', 'DefaultController');

Router::post('login', 'SecurityController');
Router::post('addRecipe', 'RecipeController');

Router::run($path);