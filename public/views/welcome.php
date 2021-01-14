<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/welcome_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Welcome to PerfectMeal</title>
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="logo">
                <img name="logo" src="public/img/logo.svg">
            </div>
        </div>
        <div class="content">
            <div class="welcome-text">
                Do you want to make dish only from the products you have in the fridge?
                Or are you looking for the perfect meal that includes all your favourite ingredients?
                By PerfectMeal you can do so!
            </div>

            <div class="mainpage-link">
                <a href="searchRecipe">Search for a recipe!</a>
            </div>
        </div>
        <?php include('view_parts/common/footer.php') ?>
    </div>
</body>