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

    public static function getAuthenticatedUsername(){
        if(isset($_COOKIE['user']))
            return $_COOKIE['user'];
    }

    public static function revokeAccess(){
        setcookie("user", '', 0);
    }

    public static function checkAuthentication($url){
        if(in_array($url, self::$authenticatedViews) and !isset($_COOKIE['user']))
            self::headTo('login');

        if(isset($_COOKIE['user']) and ($url == 'login' or $url == 'register'))
            self::headTo('searchRecipe');
    }

    private static function headTo($view){
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/{$view}");
    }
}