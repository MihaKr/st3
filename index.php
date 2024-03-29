<?php

session_start();

require_once("controller/AlertController.php");
require_once("controller/GroupController.php");
require_once("controller/UserController.php");
require_once("controller/EventController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "" => function () {
        if(UserController::loggedIn()) {
            ViewHelper::redirect(BASE_URL . "alert");
        }
        else {
            ViewHelper::redirect(BASE_URL . "user/login");
        }
    },
    "event/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            EventController::add();
        } else {
            EventController::showAddForm();
        }    
    },
    "user/login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();
        } else {
            if(UserController::loggedIn()) {
                UserController::login();
            }
            else {
                UserController::LoginForm();
            }
        }
    },
    "user/register" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::register();
        } else {
            UserController::registerForm();
        }
    },
    "user/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::edit();
        } else {
            UserController::showEditForm();
        }
    },
    "user/logout" => function () {
        UserController::logout();
    },
    "user/profile" => function () {
        UserController::profile();
    },
    "event" => function () {
        EventController::event_details();
    },
    "alert" => function () {
        AlertController::alert_details();
    },
    "Alert/accept" => function () {
        $data = $_POST['id'];
        AlertController::accept($data);
    },
    "Alert/decline" => function () {
        $data = $_POST['id'];
        AlertController::decline($data);
    },
    "group/add" => function () {
        $data = $_POST['name'];
        echo($data);
        GroupController::groupAdd($data);
    },
    "group/lastAdd" => function () {
        echo json_encode("aaa");        
        GroupController::getLast();
    },
    "anon/check" => function () {
        GroupController::showEvents();
    },
    "group/getList" => function () {
        GroupController::getAllGroups();
    },
    ];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
