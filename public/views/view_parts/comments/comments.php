<div class="comments">
    <p>Comments</p>
    <?php
        if($messages['logged_user'])
            include('logged_rate.php');
        else
            include('rate.php');

        foreach($models['ratings'] as $rating){
            include('comment.php');
        }
    ?>
</div>