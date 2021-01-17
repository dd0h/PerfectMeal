<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';


class RecipeRepository extends Repository
{

    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            return null;
        }

        return new Recipe(
            $recipe['id'],
            $recipe['title'],
            $recipe['tags'],
            $recipe['ingredients'],
            $recipe['proportions'],
            $recipe['directions'],
            $recipe['image'],
            $recipe['created_at'],
            $recipe['user_id']
        );
    }

    public function getAverageRecipeRating($recipe_id): ?float
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM getAverageRating(:id)
        ');
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();

        $average_recipe_rating = $stmt->fetch(PDO::FETCH_ASSOC);
        $average_recipe_rating = (float) $average_recipe_rating['getaveragerating'];

        return $average_recipe_rating;
    }

    public function getAllRecipes(): ?array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT r.id, title, ingredients, image, created_at, u.username
            FROM recipes r JOIN users u ON r.user_id=u.id
        ');
        $stmt->execute();

        while($searchedRecipes_table[] = $stmt->fetch(PDO::FETCH_ASSOC));

        if ($searchedRecipes_table == false) {
            return null;
        }

        $searchedRecipes = [];
        foreach($searchedRecipes_table as $searchedRecipe){
            if($searchedRecipe['id']) $searchedRecipes[] = new searchRecipe(
                $searchedRecipe['id'],
                $searchedRecipe['title'],
                $searchedRecipe['ingredients'],
                $searchedRecipe['image'],
                $searchedRecipe['created_at'],
                $searchedRecipe['username'],
                $this->getAverageRecipeRating($searchedRecipe['id'])
            );
        }
        return $searchedRecipes;
    }

    public function getRecipesByTags(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        $stmt = $this->database->connect()->prepare('
            SELECT r.id, title, ingredients, image, created_at, u.username, getAverageRating(r.id)
            FROM recipes r JOIN users u ON r.user_id=u.id WHERE LOWER(ingredients) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRecipe(Recipe $recipe): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes (title, tags, ingredients, proportions, directions, image, created_at, user_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getTags(),
            $recipe->getIngredients(),
            $recipe->getProportions(),
            $recipe->getDirections(),
            $recipe->getImage(),
            $recipe->getCreatedAt(),
            $recipe->getUserId(),
        ]);
    }
}