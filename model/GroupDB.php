<?php

require_once "DBInit.php";

class GroupDB {
    public static function getID($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM groups WHERE groupName='$id'");
        $statement->execute();

        return $statement->fetchColumn(0);
    }

    public static function getEventDATA($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT eventId, name, groupId, userId, location, date, about FROM event WHERE eventId = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function insert($name) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO groups (groupName) VALUES (:name)");
        $statement->bindParam(":name", $name);
        $statement->execute();
    }

    
    public static function getLastId() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM groups ORDER BY groupId DESC LIMIT 1");

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function exists($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupName FROM groups WHERE groupName = :name");
        $statement->bindParam(":name", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }
}
