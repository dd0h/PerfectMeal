<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Add recipe</title>
</head>
<body>
    <div class="container">
        <?php include('common_view_parts/upper_bar.php') ?>
        <div class="content">
            <div class="add-recipe-container">
                <div class="add-recipe-text">Add recipe</div>
                <form action="addRecipe" method="POST" enctype="multipart/form-data">
                    <div class="input-container">
                        Title
                        <input name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"/>
                        <div class="messages">
                            <?php if(isset($messages['title-error']) and !empty($messages)) {
                                echo $messages['title-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="input-container">
                        Tags (cuisine, diet type, meal type)
                        <textarea name="tags"><?php
                            echo isset($_POST['tags']) ? $_POST['tags'] : ''
                            ?></textarea>
                        <div class="messages">
                            <?php if(isset($messages['tags-error']) and !empty($messages)) {
                                echo $messages['tags-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="input-container">
                        Ingredients
                        <textarea name="ingredients"><?php
                            echo isset($_POST['ingredients']) ? $_POST['ingredients'] : ''
                            ?></textarea>
                        <div class="messages">
                            <?php if(isset($messages['ingredients-error']) and !empty($messages)) {
                                echo $messages['ingredients-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="input-container">
                        Ingredients proportions
                        <textarea name="proportions"><?php
                            echo isset($_POST['proportions']) ? $_POST['proportions'] : ''
                            ?></textarea>
                        <div class="messages">
                            <?php if(isset($messages['proportions-error']) and !empty($messages)) {
                                echo $messages['proportions-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="input-container">
                        Directions
                        <textarea name="directions"><?php
                            echo isset($_POST['directions']) ? $_POST['directions'] : ''
                            ?></textarea>
                        <div class="messages">
                            <?php if(isset($messages['directions-error']) and !empty($messages)) {
                                echo $messages['directions-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="input-container">
                        Add photo
                        <input name="file" id="photo" type="file" value="<?php
                            echo isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : ''
                        ?>"/>
                        <label for="photo">Choose file</label>
                        <div class="messages">
                            <?php if(isset($messages['file-error']) and !empty($messages)) {
                                echo $messages['file-error'];
                            } ?>
                        </div>
                    </div>
                    <div class="buttons">
                        <button name="clear" type="reset">Clear</button>
                        <button name="add-my-recipe" type="submit">Add my recipe</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>