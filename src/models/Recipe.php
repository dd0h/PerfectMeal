<?php


class Recipe
{
    private $id;
    private $title;
    private $tags;
    private $ingredients;
    private $proportions;
    private $directions;
    private $image;
    private $created_at;
    private $user_id;

    public function __construct(
        $id, $title, $tags, $ingredients, $proportions, $directions, $image, $created_at, $user_id
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->tags = $tags;
        $this->proportions = $proportions;
        $this->directions = $directions;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->user_id = $user_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getProportions()
    {
        return $this->proportions;
    }

    public function setProportions($proportions)
    {
        $this->proportions = $proportions;
    }

    public function getDirections()
    {
        return $this->directions;
    }

    public function setDirections($directions)
    {
        $this->directions = $directions;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }


    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }




}