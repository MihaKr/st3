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

}
