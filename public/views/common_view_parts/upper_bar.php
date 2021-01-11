<div class="bar">
    <div class="logo">
        <img name="logo" src="public/img/logo.svg">
    </div>
    <?php if(isset($username)) include ('logged_menu.php'); else  include ('menu.php');?>
</div>

