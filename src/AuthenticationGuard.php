<?php

require_once __DIR__ .'/models/User.php';

class AuthenticationGuard
{
    private static $authenticatedViews = [];

    public static function protect(array $views){
        self::$authenticatedViews = $views;
    }

    public static function authenticateUser(User $user){
        setcookie("user", $user->getUsername(), time() + (86400 * 30), "/");
    }

    public static function revokeAccess(){
        setcookie("user", '', 0);
    }

    public static function checkAuthentication($url){
        if(in_array($url, self::$authenticatedViews) and !isset($_COOKIE['user'])){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }
}