<form method="POST" action="
            viewRecipe?recipe_id=<?php echo $models['recipe']->getId(); ?>
            &delete_rating_id=<?php echo $rating->getId(); ?>
        ">
    <button type="submit>"<i class="far fa-trash-alt"></i></button>
</form>