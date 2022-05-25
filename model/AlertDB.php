<?php

require_once "DBInit.php";

class AlertDB {
    public static function getID($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT groupId FROM groups WHERE groupName='$id'");
        $statement->execute();

        return $statement->fetchColumn(0);
    }

    public static function send($userId, $eventId) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO alerts (eventId, userId) VALUES (:eventId, :userId)");
            
        $statement->bindParam(":eventId", $eventId);
        $statement->bindParam(":userId", $userId);

        $statement->execute();
    }
    
    public static function getUserId($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT userId FROM user 
        WHERE group1 = :id OR group2 = :id OR group3 = :id");

        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetchAll();  
    }

    public static function getAlertDATA($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM event WHERE eventId = ANY (
            SELECT eventId FROM alerts WHERE alertId = :id)");        
            $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function getAlerts($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM event WHERE eventId = ANY (
            SELECT eventId FROM alerts WHERE userId = :id AND acc = 1)");

        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetchAll();  
    }

    public static function getAId($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT alertId FROM alerts WHERE userId = :id");

        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetchAll();  
    }

    public static function accept($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE alerts SET acc = 2 WHERE alertId = :alertId");
        $statement->bindParam(":alertId", $id);

        $statement->execute();
    }

    public static function decline($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE alerts SET acc = 0 WHERE alertId = :alertId");
        $statement->bindParam(":alertId", $id);

        $statement->execute();
    }

    public static function getCreatorId($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT alertId FROM alerts WHERE userId= :id ORDER BY alertId DESC LIMIT 1");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

}
