<?php
namespace App\Helpers;

class Helpers {

    public static function dd($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    public static function redirect($url) {
        header('Location: ' . $url);
        die();
    }

    public static function get($key) {
        if(isset($_GET[$key])) {
            return $_GET[$key];
        }
        return null;
    }

    public static function post($key) {
        if(isset($_POST[$key])) {
            return $_POST[$key];
        }
        return null;
    }

    public static function session($key) {
        if(isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function unsetSession($key) {
        unset($_SESSION[$key]);
    }

    public static function isLogged() {
        return isset($_SESSION['user']);
    }

    public static function isAdmin() {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin';
    }

    public static function isUser() {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user';
    }

    public static function isGuest() {
        return !isset($_SESSION['user']);
    }

    public static function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function isGet() {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    public static function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }

    public static function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    public static function isEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isUrl($url) {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public static function isIp($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP);
    }

    public static function isInt($int) {
        return filter_var($int, FILTER_VALIDATE_INT);
    }
}