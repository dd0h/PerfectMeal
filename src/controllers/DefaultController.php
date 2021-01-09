<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('welcome');
    }

    public function login()
    {
        $this->render('login');
    }

    public function register()
    {
        $this->render('register');
    }

    public function viewRecipe()
    {
        $this->render('view_recipe');
    }

    public function addRecipe()
    {
        $this->render('add_recipe');
    }

    public function searchRecipe()
    {
        $this->render('search_recipe');
    }
}