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
                <input placeholder="add ingredients" type="text"/>
                <div class="input-dropdown">
                    <div class="dropdown-content">

                    </div>
                </div>
                <div class="ingredients-wrapper">

                </div>
            </div>

            <div class="recipes-container">
                <div class="heading">Recipes</div>
                <div class="menu">
                    <div class="dropdown">
                        <button>Cuisine</button>
                        <div class="dropdown-content">
                            <div class="option">Italian</div>
                            <div class="option">Polish</div>
                            <div class="option">Thai</div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button>Diet</button>
                        <div class="dropdown-content">
                            <div class="option">Vegan</div>
                            <div class="option">Vegetarian</div>
                            <div class="option">Pig</div>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button>Meal type</button>
                        <div class="dropdown-content">
                            <div class="option">Breakfast</div>
                            <div class="option">Dinner</div>
                            <div class="option">Supper</div>
                        </div>
                    </div>
                </div>
                <div class="tags-wrapper">

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