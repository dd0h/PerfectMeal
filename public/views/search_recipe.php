<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/search_recipe_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <script defer src="public/js/search.js"></script>
    <title>Search for a recipe!</title>
</head>
<body>
    <div class="container">
        <?php include('view_parts/common/upper_bar.php') ?>
        <div class="content">

            <div class="ingredients-container">
                <div class="heading">Your ingredients</div>
                <div class="menu">
                    <button>Typing</button>
                    <button>Categories</button>
                </div>
                <input placeholder="search ingredients" type="text"/>
                <div class="ingredients-wrapper">

                </div>
            </div>

            <div class="recipes-container">
                <div class="heading">Recipes</div>
                <div class="menu">
                    <button>Cuisine</button>
                    <button>Diet</button>
                    <button>Meal type</button>
                </div>
                <div class="tags-container">
                    <div class="tag"><i class="fas fa-times-circle"></i>lactose free</div>
                    <div class="tag"><i class="fas fa-times-circle"></i>vegan</div>
                    <div class="tag"><i class="fas fa-times-circle"></i>italian</div>
                </div>
                <div class="recipes-wrapper">

                </div>
            </div>
        </div>
        <?php include('view_parts/common/footer.php') ?>
    </div>
</body>

<template id="recipe-template">
    <a href="">
        <div class="recipe-frame">
            <img name="food-photo" src="">
            <div class="stars">

            </div>
            <div class="recipe-name"></div>
            <div class="needed-ingredients"></div>
            <div class="author">Added by: </div>
        </div>
    </a>
</template>