<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('login', 'DefaultController');
Router::get('register', 'DefaultController');
Router::get('view_recipe', 'DefaultController');
Router::get('add_recipe', 'DefaultController');
Router::get('search_recipe', 'DefaultController');

Router::run($path);