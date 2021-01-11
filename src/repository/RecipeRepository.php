<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{

    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($recipe == false) {
            return null;
        }

        return new Recipe(
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