<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/search_recipe_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Search for a recipe!</title>
</head>
<body>
    <div class="container">
        <?php include('common_view_parts/upper_bar.php') ?>
        <div class="content">

            <div class="ingredients-container">
                <div class="heading">Your ingredients</div>
                <div class="menu">
                    <button>Typing</button>
                    <button>Categories</button>
                </div>
                <input type="text"/>
                <div class="tags-container">
                    <div class="tag"><i class="fas fa-times-circle"></i>chilli pepper</div>
                    <div class="tag"><i class="fas fa-times-circle"></i>onion</div>
                    <div class="tag"><i class="fas fa-times-circle"></i>oregano</div>
                    <div class="tag"><i class="fas fa-times-circle"></i>cayenne</div>
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
                    <div class="recipe-frame">
                        <img name="food-photo" src="public/img/food_example1.png">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="recipe-name">Chilli con carne with garlic sauce</div>
                        <div class="needed-ingredients">
                            You also need: tomato sauce, paprika, canned tomato,
                            ground beef, tomato paste, beer, worcestershire, cumin, garlic
                        </div>
                        <div class="author">Added by: Jeorge96</div>
                    </div>
                    <div class="recipe-frame">
                        <img name="food-photo" src="public/img/food_example2.png">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="recipe-name">Chilli con carne by Mruczek78</div>
                        <div class="needed-ingredients">
                            You also need: tomato sauce, paprika, canned tomato,
                            ground beef, tomato paste, beer, worcestershire, cumin, garlic
                        </div>
                        <div class="author">Added by: Jeorge96</div>
                    </div>
                    <div class="recipe-frame">
                        <img name="food-photo" src="public/img/food_example3.png">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="recipe-name">Hot spicy spaghetti with cayenne and chilli pepper and Hot spicy spaghetti with cayenne and chilli pepper</div>
                        <div class="needed-ingredients">
                            You also need: tomato sauce, paprika, canned tomato,
                            ground beef, tomato paste, beer, worcestershire, cumin, garlic
                        </div>
                        <div class="author">Added by: Jeorge96</div>
                    </div>
                    <div class="recipe-frame">
                        <img name="food-photo" src="public/img/food_example3.png">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="recipe-name">Hot spicy spaghetti with cayenne and chilli pepper and Hot spicy spaghetti with cayenne and chilli pepper</div>
                        <div class="needed-ingredients">
                            You also need: tomato sauce, paprika, canned tomato,
                            ground beef, tomato paste, beer, worcestershire, cumin, garlic
                        </div>
                        <div class="author">Added by: Jeorge96</div>
                    </div>
                </div>
            </div>

        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>