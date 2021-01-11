<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $login = $_POST['login'];

        $user = $this->userRepository->getUser($login);
        if(!$user){
            return $this->render('login', ['messages' => ['User with this username or email not exist!']]);
        }

        $user_password = $user->getPassword();
        if(!password_verify($_POST['password'], $user_password)){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        AuthenticationGuard::authenticateUser($user);

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/searchRecipe");
    }

    public function logout(){
        AuthenticationGuard::revokeAccess();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];

        if($this->userRepository->getUser($username)){
            return $this->render('register', ['messages' => ['This username is already used']]);
        }

        if($this->userRepository->getUser($email)){
            return $this->render('register', ['messages' => ['This email is already used']]);
        }

        if ($password !== $repeat_password) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $user = new User($username, $email, password_hash($password, PASSWORD_BCRYPT));

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}