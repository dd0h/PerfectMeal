<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';
require_once __DIR__.'/../models/DAO/searchRecipe.php';

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

    public function getSearchedRecipes(): ?array
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
                $searchedRecipe['username']
            );
        }
        return $searchedRecipes;
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