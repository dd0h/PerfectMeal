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

    public function view_recipe()
    {
        $this->render('view_recipe');
    }

    public function add_recipe()
    {
        $this->render('add_recipe');
    }

    public function search_recipe()
    {
        $this->render('search_recipe');
    }
}