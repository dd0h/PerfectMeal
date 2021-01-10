<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/login_styles.css">
    <script src="https://kit.fontawesome.com/46e60e2318.js" crossorigin="anonymous"></script>
    <title>Sign in</title>
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="logo">
                <img name="logo" src="public/img/logo.svg">
            </div>
            <div class="sign-up">
                <div class="button"><p>Sign up</p></div>
            </div>
        </div>
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