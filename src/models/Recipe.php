<?php


class Recipe
{
    private $title;
    private $ingredients;
    private $tags;
    private $recipe;
    private $directions;
    private $image;
    private $author;

    public function __construct($title, $ingredients, $tags, $recipe, $directions, $image, $author)
    {
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->tags = $tags;
        $this->recipe = $recipe;
        $this->directions = $directions;
        $this->image = $image;
        $this->author = $author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    public function getRecipe()
    {
        return $this->recipe;
    }

    public function setRecipe($recipe)
    {
        $this->recipe = $recipe;
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

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }




}