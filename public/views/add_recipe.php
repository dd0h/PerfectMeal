<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/add_recipe_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Add recipe</title>
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="logo">
                <img name="logo" src="public/img/logo.svg">
            </div>
            <div class="logged">
                <form action="logout" method="POST">
                    <button type="submit"><p>Logout</p></button>
                </form>
            </div>
        </div>
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
        <div class="footer">
            <div class="links">
                <a class="fab fa-facebook-square fa-2x" href="#"></a>
                <a class="fab fa-twitter-square fa-2x" href="#"></a>
                <a class="fab fa-instagram fa-2x" href="#"></a>
            </div>
            <div class="copyright">© 2020 github.com/dd0h/ All Rights Reserved</div>
        </div>
    </div>
</body>