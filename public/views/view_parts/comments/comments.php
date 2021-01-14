<div class="comments">
    <p>Comments</p>
    <?php
        switch($messages['user_type']){
            case 'guest':
                include('rating/guest.php');
                break;
            case 'recipe_owner':
                include('rating/recipe_owner.php');
                break;
            case 'already_rated':
                include('rating/already_rated.php');
                break;
            default:
                include('rating/logged.php');
        }

        echo "<div class='average'>Average rating: ".$messages['average_rating']."</div>";

        foreach($models['ratings'] as $rating){
            include('comment.php');
        }
    ?>
</div>