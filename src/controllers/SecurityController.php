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

        $user = $this->userRepository->getUserByUsernameOrEmail($login);
        if(!$user){
            return $this->render('login', ['messages' => ['User with this username or email not exist!']]);
        }

        $user_password = $user->getPassword();
        if(!password_verify($_POST['password'], $user_password)){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        AuthenticationGuard::authenticateUser($user);

        $this->headTo("searchRecipe");
    }

    public function logout(){
        AuthenticationGuard::revokeAccess();
        $this->headTo("login");
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

        if($username == null
            or $email == null
            or $password == null
            or $repeat_password == null){
            return $this->render('register', ['messages' => ['You have to fill all fields!']]);
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $this->render('register', ['messages' => ['Please enter proper email!']]);
        }

        if($this->userRepository->getUserByUsernameOrEmail($username)){
            return $this->render('register', ['messages' => ['This username is already used']]);
        }

        if($this->userRepository->getUserByUsernameOrEmail($email)){
            return $this->render('register', ['messages' => ['This email is already used']]);
        }

        if ($password !== $repeat_password) {
            return $this->render('register', ['messages' => ['The passwords are not the same!']]);
        }

        if(!isset($_POST['checkbox'])){
            return $this->render('register', ['messages' => ['You have to accept PerfectMeal site rules!']]);
        }

        $user = new User(null, $username, $email, password_hash($password, PASSWORD_BCRYPT));

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}