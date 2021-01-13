<!DOCTYPE html>
<head xmlns="http://www.w3.org/1999/html">
    <link rel="stylesheet" type="text/css" href="public/css/view_recipe_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <script src="public/js/stars.js"></script>
    <title>Chilli con carne with garlic sauce</title>
</head>
<body onload="starsHovering()">
    <div class="container">
        <?php include('common_view_parts/upper_bar.php') ?>
        <div class="content">
            <div class="recipe-container">
                <div class="meal-name"><?php if(isset($messages) and !empty($messages)) {
                        echo $messages['title'];
                    } ?></div>
                <img name="food-photo" src="public/uploads/<?php if(isset($messages) and !empty($messages)) {
                    echo $messages['image'];
                } ?>">
                <div class="detail-container">
                    <div class="ingredients">
                        <p>Ingredients</p>
                        <div class="ingredients-container">
                            <?php if(isset($messages['ingredients']) and !empty($messages['ingredients'])) {
                                foreach($messages['ingredients'] as $ingredient)
                                    echo "<div class='tag'></i>$ingredient</div>";
                            } ?>
                        </div>
                    </div>
                    <div class="tags">
                        <p>Tags</p>
                        <div class="tags-container">
                            <?php if(isset($messages['tags']) and !empty($messages['tags'])) {
                                foreach($messages['tags'] as $tag)
                                    echo "<div class='tag'></i>$tag</div>";
                            } ?>
                        </div>
                    </div>
                    <div class="recipe">
                        <p>Ingredients proportions</p>
                        <text style="white-space: pre-line"><?php if(isset($messages) and !empty($messages)) {
                            echo $messages['proportions'];
                        } ?></text>
                    </div>
                    <div class="directions">
                        <p>Directions</p>
                        <?php if(isset($messages) and !empty($messages)) {
                            echo $messages['directions'];
                        } ?>
                    </div>
                    <div class="author">
                        <p>Author: <?php if(isset($messages) and !empty($messages)) {
                            echo $messages['author'];
                        } ?></p>
                    </div>
                <?php include ('common_view_parts/comments.php') ?>
                </div>
            </div>
        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>