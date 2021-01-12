<?php


class Rating
{
    private $id;
    private $recipe_id;
    private $user_id;
    private $rating;
    private $comment;
    private $rated_on;

    public function __construct($id, $recipe_id, $user_id, $rating, $comment, $rated_on)
    {
        $this->id = $id;
        $this->recipe_id = $recipe_id;
        $this->user_id = $user_id;
        $this->rating = $rating;
        $this->comment = $comment;
        $this->rated_on = $rated_on;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getRecipeId()
    {
        return $this->recipe_id;
    }

    public function setRecipeId($recipe_id): void
    {
        $this->recipe_id = $recipe_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    public function getRatedOn()
    {
        return $this->rated_on;
    }

    public function setRatedOn($rated_on): void
    {
        $this->rated_on = $rated_on;
    }

}