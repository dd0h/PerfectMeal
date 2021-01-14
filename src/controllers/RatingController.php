<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__ .'/../models/Rating.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';

class RatingController extends AppController {

    private $message = [];
    private $ratingRepository;
    private $userRepository;
    private $recipeRepository;


    public function __construct()
    {
        parent::__construct();
        $this->ratingRepository = new RatingRepository();
        $this->userRepository = new UserRepository();
        $this->recipeRepository = new RecipeRepository();
    }

    public function rateRecipe(){

        $recipe_id = (int)$_GET['id'];

        if($_POST['rate']==null){
            return $this->render("searchRecipe", ['messages' => $this->message]);
        }

        $username = AuthenticationGuard::getAuthenticatedUsername();
        $user_id = $this->userRepository->getUserByUsernameOrEmail($username)->getId();

        $rating = new Rating(
            null,
            $recipe_id,
            $user_id,
            $_POST['rate'],
            $_POST['comment'],
            date("Y-m-d H:i:s"),
        );

        $this->ratingRepository->addRating($rating);

        $this->headTo("viewRecipe?id={$recipe_id}");
    }
}