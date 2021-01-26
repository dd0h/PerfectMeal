<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__ .'/../models/Rating.php';
require_once __DIR__.'/../repository/RecipeRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../exceptions/UserNotFoundException.php';

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

    public function viewRecipe(){
        if(isset($_GET['delete_rating_id']) and isset($_GET['recipe_id']))
            $this->deleteRating((int)$_GET['delete_rating_id']);

        elseif(isset($_GET['recipe_id']))
            $this->rateRecipe((int)$_GET['recipe_id']);

        if(isset($_GET['recipe_id']))
            $this->headTo("viewRecipe?id={$_GET['recipe_id']}");
        else
            return $this->render("searchRecipe", ['messages' => $this->message]);
    }

    private function deleteRating($rating_id){
        $this->ratingRepository->deleteRating($rating_id);
    }

    private function rateRecipe($recipe_id){

        if($_POST['rate']==null){
            return $this->render("searchRecipe", ['messages' => $this->message]);
        }

        $username = AuthenticationGuard::getAuthenticatedUsername();
        $user = $this->userRepository->getUserByUsernameOrEmail($username);

        try{
            if(!$user) throw new UserNotFoundException();
        }
        catch (Exception $e){
            echo $e->errorMessage();
            exit;
        }

        $user_id = $user->getId();

        $rating = new Rating(
            null,
            $recipe_id,
            $user_id,
            $_POST['rate'],
            $_POST['comment'],
            date("Y-m-d H:i:s"),
        );

        $this->ratingRepository->addRating($rating);
    }
}