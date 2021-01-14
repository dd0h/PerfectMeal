<?php


class searchRecipe
{
    private $id;
    private $title;
    private $ingredients;
    private $image;
    private $created_at;
    private $author;

    public function __construct(
        $id, $title, $ingredients, $image, $created_at, $author
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->author = $author;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getAuthor()
    {
        return $this->author;
    }



}