<div class="comment">
    <div class="comment-info">
        <div class="comment-author">
            <?php
                foreach($models['rating_authors'] as $rating_author)
                    if($rating_author->getId()==$rating->getUserId()){
                        echo $rating_author->getUsername();
                        break;
                    }
            ?>
        </div>
        <?php if($messages['user_type']=='MODERATOR') include('rating/delete_rating.php'); ?>
        <div class="comment-date">posted <?php echo $rating->getRatedOn(); ?></div>
    </div>
    <div class="comment-content">
        <div class="comment-text"><?php echo $rating->getComment(); ?></div>
        <div class="stars">
            <?php for($i = 0; $i < $rating->getRating(); $i++){
                echo '<i class="fas fa-star"></i>';
            } ?>
        </div>
    </div>
</div>