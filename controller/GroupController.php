<?php

require_once("model/GroupDB.php");

require_once("ViewHelper.php");

class GroupController {

    public static function groupAdd() {
        $validData = isset($_POST["name"]) && !empty($_POST["name"]);

        if ($validData) {
            GroupDB::insert($_POST["name"]);
            ViewHelper::redirect(BASE_URL . "profile");
        } 
        else{

        }
    }
}

