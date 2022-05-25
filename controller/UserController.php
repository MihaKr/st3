<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function showC() {
        $vars = [];
        ViewHelper::render("view/calendar.php", $vars);
    }

    public static function loggedIn() {
        session_start();
        return((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true));
    }

    public static function login() {
        session_start(); 
            if (UserDB::validLoginAttempt($_POST["username"], $_POST["password"])) {

                $_SESSION['user'] = $_POST["username"];
                $_SESSION['userId'] = UserDB::getId($_POST["username"]);
                $_SESSION["loggedin"] = true;

                ViewHelper::render("view/calendar.php");
            } else {
                ViewHelper::render("view/login.php", [
                    "errorMessage" => "Invalid username or password."
                ]);
            }
    }

    public static function LoginForm() {
        ViewHelper::render("view/login.php");
    }     
    
    public static function registerForm($values = ["user" => "", "password" => ""]) {
        ViewHelper::render("view/register.php", $values);
    }

    public static function register() {
        session_start(); 
        $validData = isset($_POST["name"]) && !empty($_POST["name"]) && 
                isset($_POST["password"]) && !empty($_POST["password"]);
        echo($validData);        
        if ($validData) {
            UserDB::addUser($_POST["name"], $_POST["password"]);
            $_SESSION['user'] = $_POST["name"];
            $_SESSION['userId'] = UserDB::getId($_POST["name"]);
            $_SESSION["loggedin"] = true;
            ViewHelper::redirect(BASE_URL . "user/calendar");
        } else {
            self::registerForm($_POST);
        }
    }   
    
    public static function showEditForm($data = [], $errors = []) {
        session_start(); 

        if (empty($data)) {
            $data = UserDB::getUserDATAAll($_SESSION['userId']);
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        
        ViewHelper::render("view/profile-edit.php", ["user" => $data, "errors" => $errors]);
    }    


    public static function edit() {

        $validData = isset($_POST["name"]) && !empty($_POST["name"]) && 
            isset($_POST["group1"]) && !empty($_POST["group1"]) &&
            isset($_POST["group2"]) && !empty($_POST["group2"]) &&
            isset($_POST["group3"]) && !empty($_POST["group3"]) &&
            isset($_POST["userId"]) && !empty($_POST["userId"]);

        if ($validData) {
            UserDB::update($_POST["userId"], $_POST["name"], $_POST["group1"], $_POST["group2"], $_POST["group3"]);
            ViewHelper::redirect(BASE_URL . "user/profile");
        } else {
            self::showEditForm($_POST);
        }
    }

    public static function logout() { 
        session_start();
        session_destroy();  
        ViewHelper::redirect(BASE_URL . "user/login");
    }

    public static function profile() { 
        session_start();
        ViewHelper::render("view/profile.php", ["user" => UserDB::getUserDATA($_SESSION['userId'])]);
    }
}