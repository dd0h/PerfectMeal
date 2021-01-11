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
                        <input name="title"/>
                    </div>
                    <div class="input-container">
                        Tags (cuisine, diet type, meal type)
                        <textarea name="tags"></textarea>
                    </div>
                    <div class="input-container">
                        Ingredients
                        <textarea name="ingredients"></textarea>
                    </div>
                    <div class="input-container">
                        Ingredients proportions
                        <textarea name="proportions"></textarea>
                    </div>
                    <div class="input-container">
                        Directions
                        <textarea name="directions"></textarea>
                    </div>
                    <div class="input-container">
                        Add photo
                        <input name="file" id="photo" type="file"/>
                        <label for="photo">Choose file</label>
                        <div class="messages">
                            <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="buttons">
                        <button name="clear" type="submit">Clear</button>
                        <button name="add-my-recipe" type="submit">Add my recipe</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>