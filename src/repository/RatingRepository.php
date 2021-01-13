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
}