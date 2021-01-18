<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" type="text/css" href="public/css/view_recipe_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <script defer src="public/js/stars.js"></script>
    <title>Chilli con carne with garlic sauce</title>
</head>
<body>
    <div class="container">
        <?php include('view_parts/common/upper_bar.php') ?>
        <div class="content">
            <div class="recipe-container">
                <div class="meal-name"><?php echo $models['recipe']->getTitle(); ?></div>
                <img name="food-photo" src="public/uploads/<?php echo $models['recipe']->getImage(); ?>">
                <div class="detail-container">
                    <div class="ingredients">
                        <p>Ingredients</p>
                        <div class="ingredients-container">
                            <?php foreach($models['recipe']->getIngredients() as $ingredient)
                                    echo "<div class='tag'></i>$ingredient</div>"; ?>
                        </div>
                    </div>
                    <div class="tags">
                        <p>Tags</p>
                        <div class="tags-wrapper">
                            <?php foreach($models['recipe']->getTags() as $tag)
                                echo "<div class='tag'></i>$tag</div>"; ?>
                        </div>
                    </div>
                    <div class="recipe">
                        <p>Ingredients proportions</p>
                        <text style="white-space: pre-line"><?php echo $models['recipe']->getProportions(); ?></text>
                    </div>
                    <div class="directions">
                        <p>Directions</p>
                        <?php echo $models['recipe']->getDirections(); ?>
                    </div>
                    <div class="author">
                        <p>Author: <?php echo $models['author']->getUsername(); ?></p>
                    </div>
                <?php include('view_parts/comments/comments.php') ?>
                </div>
            </div>
        </div>
        <?php include('view_parts/common/footer.php') ?>
    </div>
</body>