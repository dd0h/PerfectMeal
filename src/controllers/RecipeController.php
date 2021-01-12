<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';

class RecipeController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $userRepository;
    private $recipeRepository;


    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->recipeRepository = new RecipeRepository();
    }

    public function getRecipes(){
        $recipes = $this->recipeRepository->getAllRecipes();
        foreach($recipes as $recipe){
            $id = $recipe->getId();
            $this->message[$id]['id'] = $id;
            $this->message[$id]['title'] = $recipe->getTitle();
            $this->message[$id]['ingredients'] = $recipe->getIngredients();
            $this->message[$id]['proportions'] = $recipe->getProportions();
            $this->message[$id]['directions'] = $recipe->getDirections();
            $this->message[$id]['image'] = $recipe->getImage();
            $this->message[$id]['created_at'] = $recipe->getCreatedAt();

            $author_id = $recipe->getUserId();
            $this->message[$id]['author'] = $this->userRepository->getUserById($author_id)->getUsername();
        }
        return $this->render('search_recipe', ['messages' => $this->message]);
    }

    public function viewRecipe(){
        if(!isset($_GET['id']))
            return $this->render('search_recipe', ['messages' => $this->message]);

        $id = (int)$_GET['id'];
        $recipe = $this->recipeRepository->getRecipe($id);
        $this->message['title'] = $recipe->getTitle();

        $tags = $recipe->getTags();
        $ingredients = $recipe->getIngredients();

        $tags = $this->prepareTags($tags);
        $ingredients = $this->prepareTags($ingredients);

        $this->message['tags'] = $tags;
        $this->message['ingredients'] = $ingredients;
        $this->message['proportions'] = $recipe->getProportions();
        $this->message['directions'] = $recipe->getDirections();
        $this->message['image'] = $recipe->getImage();
        $this->message['created_at'] = $recipe->getCreatedAt();

        $author_id = $recipe->getUserId();
        $this->message['author'] = $this->userRepository->getUserById($author_id)->getUsername();

        //TODO add ratings to view

        return $this->render('view_recipe', ['messages' => $this->message]);
    }

    private function prepareTags($tags){
        str_replace(' ', '', $tags);
        $tags = explode( ',', $tags);
        return $tags;
    }

    public function addRecipe()
    {
        $this->checkFields();

        if (empty($this->message)) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user = $this->userRepository->getUserByUsernameOrEmail(AuthenticationGuard::getAuthenticatedUsername());

            $recipe = new Recipe(null,
                $_POST['title'],
                $_POST['tags'],
                $_POST['ingredients'],
                $_POST['proportions'],
                $_POST['directions'],
                $_FILES['file']['name'],
                date("Y-m-d H:i:s"),
                $user->getId());

            $this->recipeRepository->addRecipe($recipe);
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/searchRecipe");
        }else {
            $this->render('add_recipe', ['messages' => $this->message]);
        }
    }

    private function checkFields(){
        if($_POST['title'] == null){
            $this->message['title-error'] = 'Title can not be empty!';
        }

        if($_POST['tags'] == null){
            $this->message['tags-error'] = 'You have to add at least 1 tag!';
        }

        if($_POST['ingredients'] == null){
            $this->message['ingredients-error'] = 'You have to add at least 1 ingredient!';
        }

        if($_POST['proportions'] == null){
            $this->message['proportions-error'] = 'Proportions can not be empty!';
        }

        if($_POST['directions'] == null){
            $this->message['directions-error'] = 'Directions can not be empty!';
        }

        if (!is_uploaded_file($_FILES['file']['tmp_name'])){
            $this->message['file-error'] = 'You need to add a photo of your meal!';
        }else{
            $this->validate($_FILES['file']);
        }
    }

    private function validate(array $file): void
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message['file-error'] = 'File is too large for destination file system.';
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message['file-error'] = 'File type is not supported.';
        }
    }
}