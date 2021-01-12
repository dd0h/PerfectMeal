<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';

class RatingController extends AppController {

    private $message = [];
    private $userRepository;
    private $recipeRepository;


    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->recipeRepository = new RecipeRepository();
    }

    public function rateRecipe(){
        //TODO adding rating in viewRecipe
    }
}