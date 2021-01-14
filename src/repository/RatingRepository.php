<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Rating.php';

class RatingRepository extends Repository
{

    public function addRating(Rating $rating): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO ratings (recipe_id, user_id, rating, comment, rated_on)
            VALUES (?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $rating->getRecipeId(),
            $rating->getUserId(),
            $rating->getRating(),
            $rating->getComment(),
            $rating->getRatedOn(),
        ]);
    }

    public function getRatingsByRecipeId(int $recipe_id): ?array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.ratings WHERE recipe_id = :recipe_id ORDER BY id DESC
        ');
        $stmt->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();

        while($ratings_table[] = $stmt->fetch(PDO::FETCH_ASSOC));

        if ($ratings_table == false) {
            return null;
        }

        $ratings = [];
        foreach($ratings_table as $rating){
            if($rating['id']) $ratings[] = new Rating(
                $rating['id'],
                $rating['recipe_id'],
                $rating['user_id'],
                $rating['rating'],
                $rating['comment'],
                $rating['rated_on'],
            );
        }
        return $ratings;
    }
}