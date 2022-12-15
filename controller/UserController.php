<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function loggedIn() {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 
        return((isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true));
    }

    public static function login() {
        if(!isset($_SESSION)) { 
            session_start(); 
        } 

        $salt = 'RHNgGIz5SoQLKhT5CaKh!2';
        $pass = password_hash($_POST["password"], PASSWORD_BCRYPT, array("salt" => $salt));

            if (UserDB::validLoginAttempt($_POST["username"], $pass)) {

                $_SESSION['user'] = $_POST["username"];
                $_SESSION['userId'] = UserDB::getId($_POST["username"]);
                $_SESSION["loggedin"] = true;

                ViewHelper::redirect(BASE_URL . "alert");
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
        if(!isset($_SESSION)) { 
            session_start(); 
        }  
        $validData = isset($_POST["name"]) && !empty($_POST["name"]) && 
                isset($_POST["password"]) && !empty($_POST["password"]);
        if(UserDB::exists($_POST["name"]) == null) {
            if ($validData) {
                $salt = 'RHNgGIz5SoQLKhT5CaKh!2';
                $pass = password_hash($_POST["password"], PASSWORD_BCRYPT, array("salt" => $salt));
                UserDB::addUser($_POST["name"], $pass);
                $_SESSION['user'] = $_POST["name"];
                $_SESSION['userId'] = UserDB::getId($_POST["name"]);
                $_SESSION["loggedin"] = true;
                ViewHelper::redirect(BASE_URL . "alert");
            } else {
                self::registerForm($_POST);
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Uporabnik s tem imenom že obstaja');</script>";
        }
    }   
    
    public static function showEditForm($data = [], $errors = []) {
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
        session_destroy();  
        ViewHelper::redirect(BASE_URL . "user/login");
    }

    public static function profile() {  
        ViewHelper::render("view/profile.php", ["user" => UserDB::getUserDATA($_SESSION['userId'])]);
    }
}