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

    public function getRecipe(){
        // TODO showing filtered recipes on searchRecipe view
    }

    public function viewRecipe(){
        // TODO showing single recipe in viewRecipe/[id]
    }

    public function addRecipe()
    {
        $this->checkFields();

        if (empty($this->message)) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $user = $this->userRepository->getUser(AuthenticationGuard::getAuthenticatedUsername());

            $recipe = new Recipe($_POST['title'],
                $_POST['tags'],
                $_POST['ingredients'],
                $_POST['proportions'],
                $_POST['directions'],
                $_FILES['file']['name'],
                date("Y-m-d H:i:s"),
                $user->getId());

            $this->recipeRepository->addRecipe($recipe);
            return $this->render('search_recipe', ['messages' => $this->message]);
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