<?php

require_once("model/GroupDB.php");

require_once("ViewHelper.php");

class GroupController {

    public static function groupAdd($name) {
        
        $validData = isset($name) && !empty($name);

        if(GroupDB::exists($name) == null) {
            if ($validData) {
                GroupDB::insert($name);
            } 
        }
    }

    public static function getLast() {
        GroupDB::getLastId();
    }

    public static function showEvents() {
        ViewHelper::render("view/anon-lookup.php", ["event" => GroupDB::getGEvents($_POST["groupcheck"])]);
    }
    public static function getAllGroups() {
        GroupDB::getAllGroups();
    }
}

