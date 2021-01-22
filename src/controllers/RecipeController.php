<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Recipe.php';
require_once __DIR__.'/../repository/RecipeRepository.php';

class RecipeController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $models = [];
    private $messages = [];
    private $userRepository;
    private $recipeRepository;
    private $ratingRepository;


    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->recipeRepository = new RecipeRepository();
        $this->ratingRepository = new RatingRepository();
    }

    public function searchRecipes()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            if($decoded['ingredients']) echo json_encode($this->recipeRepository->getSearchedRecipes(
                $decoded['ingredients'],
                $decoded['tags']
            ));
            else echo json_encode($this->recipeRepository->getIngredientsAsSuggestions());
        }
    }

    public function viewRecipe(){
        if(!isset($_GET['id']))
            return $this->render('search_recipe', ['models' => $this->models]);

        $id = (int)$_GET['id'];
        $recipe = $this->recipeRepository->getRecipe($id);

        $tags = $recipe->getTags();
        $ingredients = $recipe->getIngredients();

        $recipe->setTags($this->prepareTags($tags));
        $recipe->setIngredients($this->prepareTags($ingredients));

        $this->models['recipe'] = $recipe;

        $author_id = $recipe->getUserId();
        $this->models['author'] = $this->userRepository->getUserById($author_id);

        $ratings = $this->ratingRepository->getRatingsByRecipeId($id);
        $this->models['ratings'] = $ratings;

        foreach($this->models['ratings'] as $rating){
            $this->models['rating_authors'][] = $this->userRepository->getUserById($rating->getUserId());
        }

        $this->messages['user_type'] = $this->setUserType(
            $this->models['rating_authors'],
            $this->models['author']->getUsername()
        );


        $this->messages['average_rating'] = round($this->recipeRepository->getAverageRecipeRating($id), 2);


        return $this->render('view_recipe', ['models' => $this->models, 'messages' => $this->messages]);
    }

    public function addRecipe()
    {
        $this->checkFields();

        if (empty($this->messages)) {
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
            $this->headTo("searchRecipe");
        }else {
            $this->render('add_recipe', ['messages' => $this->messages]);
        }
    }

    private function setUserType($rating_authors, $recipe_owner){
        $logged_username = AuthenticationGuard::getAuthenticatedUsername();

        if(!$logged_username) return 'guest';

        $logged_user_role = $this->userRepository->getUserByUsernameOrEmail($logged_username)->getRole();

        if($logged_user_role == 'MODERATOR') return $logged_user_role;

        if($logged_username == $recipe_owner) return 'recipe_owner';

        if($rating_authors)
            foreach($rating_authors as $rating_author){
                if($rating_author->getUsername() == $logged_username) {
                    return 'already_rated';
                }
            }
    }

    private function prepareTags($tags){
        str_replace(' ', '', $tags);
        $tags = explode( ',', $tags);

        return $tags;
    }

    private function checkFields(){
        if($_POST['title'] == null){
            $this->messages['title-error'] = 'Title can not be empty!';
        }

        if($_POST['tags'] == null){
            $this->messages['tags-error'] = 'You have to add at least 1 tag!';
        }

        if($_POST['ingredients'] == null){
            $this->messages['ingredients-error'] = 'You have to add at least 1 ingredient!';
        }

        if($_POST['proportions'] == null){
            $this->messages['proportions-error'] = 'Proportions can not be empty!';
        }

        if($_POST['directions'] == null){
            $this->messages['directions-error'] = 'Directions can not be empty!';
        }

        if (!is_uploaded_file($_FILES['file']['tmp_name'])){
            $this->messages['file-error'] = 'You need to add a photo of your meal!';
        }else{
            $this->validate($_FILES['file']);
        }
    }

    private function validate(array $file): void
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages['file-error'] = 'File is too large for destination file system.';
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages['file-error'] = 'File type is not supported.';
        }
    }
}