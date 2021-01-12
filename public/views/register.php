<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/register_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Sign up</title>
</head>
<body>
    <div class="container">
        <?php include('common_view_parts/upper_bar.php') ?>
        <div class="content">
            <div class="register-container">
                <div class="Sign-up-text">Sign up</div>
                <div class="Sign-up-form">
                    <form action="register" method="POST">
                        username
                        <input name="username" type="text">
                        email
                        <input name="email" type="text">
                        password
                        <input name="password" type="password">
                        repeat password
                        <input name="repeat_password" type="password">
                        <div class="accept_rules">
                            <input id="accept_box" name="checkbox" type="checkbox">
                            <span class="checkmark"></span>
                            <label for="accept_box">I have read and accept PerfectMeal site rules</label>
                        </div>
                        <button type="submit">Register</button>
                        <div class="messages">
                            <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>