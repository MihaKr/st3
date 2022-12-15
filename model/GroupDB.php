<?php

require_once "DBInit.php";

class GroupDB {
    public static function getID($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM `groups` WHERE groupName='$id'");
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

        $statement = $db->prepare("INSERT INTO `groups` (groupName) VALUES (:name)");
        $statement->bindParam(":name", $name);
        $statement->execute();
    }

    
    public static function getLastId() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM `groups` ORDER BY groupId DESC LIMIT 1");

        $statement->execute();

        echo json_encode($statement->fetch(0));  
    }

    public static function exists($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupName FROM `groups` WHERE groupName = :name");
        $statement->bindParam(":name", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function getGEvents($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT name, eventId, userId, groupId, location, date, about FROM `event` WHERE groupId = :id");

        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetchall();  
    }

    public static function getAllGroups() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM `groups`");

        $statement->execute();

        echo json_encode($statement->fetchall());  
    }

    public static function getGroupName($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupName FROM `groups` WHERE groupId = :groupId");
        $statement->bindParam(":groupId", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

}
