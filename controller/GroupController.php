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
}

