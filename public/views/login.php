<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/footer_styles.css">
    <link rel="stylesheet" type="text/css" href="public/css/upper_bar_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Sign in</title>
</head>
<body>
    <div class="container">
        <?php include('common_view_parts/upper_bar.php') ?>
        <div class="content">
            <div class="login-container">
                <div class="Sign-in-text">Sign in</div>
                <div class="Sign-in-form">
                    <form action="login" method="POST">
                        username or email
                        <input name="login" type="text">
                        password
                        <input name="password" type="password">
                        <button type="submit">Login</button>
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
                <div class="Sign-up-link"><a href="register">Don't have account? Sign up now!</a></div>
            </div>
        </div>
        <?php include('common_view_parts/footer.php') ?>
    </div>
</body>