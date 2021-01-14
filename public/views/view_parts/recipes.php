<a href="viewRecipe?id=<?php echo $searchedRecipe->getId(); ?>">
    <div class="recipe-frame">
        <img name="food-photo" src="public/uploads/<?php echo $searchedRecipe->getImage(); ?>">
        <div class="stars">
            <?php
                $stars_quantity = round($searchedRecipe->getAverageRating());
                for($i = 0; $i < $stars_quantity; $i++)
                    echo '<i class="fas fa-star"></i>'
            ?>
        </div>
        <div class="recipe-name"><?php echo $searchedRecipe->getTitle(); ?></div>
        <div class="needed-ingredients">You also need: <?php echo $searchedRecipe->getIngredients(); ?></div>
        <div class="author">Added by: <?php echo $searchedRecipe->getAuthor(); ?></div>
    </div>
</a>
