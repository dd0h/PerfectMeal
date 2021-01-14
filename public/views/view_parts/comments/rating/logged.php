<div class="rate">
    Rate the recipe and leave comment (optional):
    <form name="rating-form" action="viewRecipe?id=<?php echo $models['recipe']->getId(); ?>" method="POST">
        <div class="stars">
            <i name="star" id="1" class="fas fa-star"></i>
            <i name="star" id="2" class="fas fa-star"></i>
            <i name="star" id="3" class="fas fa-star"></i>
            <i name="star" id="4" class="fas fa-star"></i>
            <i name="star" id="5" class="fas fa-star"></i>
            <input name="rate" id="rate" type="hidden">
        </div>
        <textarea name="comment"/></textarea>
        <button id="add-my-recipe" name="add-my-recipe" type="submit">Submit</button>
    </form>
</div>
