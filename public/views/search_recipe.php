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
        <?php include('view_parts/common/upper_bar.php') ?>
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
                <?php foreach($models['searchedRecipes'] as $searchedRecipe)
                    include('view_parts/recipes.php'); ?>
                </div>
            </div>
        </div>
        <?php include('view_parts/common/footer.php') ?>
    </div>
</body>