<div class="comments">
    <p>Comments</p>
    <?php if($messages['logged_user']) echo '
    <div class="rate">
        Rate the recipe and leave comment (optional):
        <form name="rating-form" action="viewRecipe?id='.$messages['id'].'" method="POST">
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
    </div>'; else echo '    
    <div class="rate">
        You have to be <a href="login">signed in</a> to rate the recipe.
    </div>'; ?>
    <div class="comment">
        <div class="comment-info">
            <div class="comment-author">By MarasKoks</div>
            <div class="comment-date">posted 2020-09-10 21-37-00</div>
        </div>
        <div class="comment-content">
            <div class="comment-text">This sucks!</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
    <div class="comment">
        <div class="comment-info">
            <div class="comment-author">By MRoman</div>
            <div class="comment-date">posted 2020-09-10 21-37-00</div>
        </div>
        <div class="comment-content">
            <div class="comment-text">Awesome!</div>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>
</div>