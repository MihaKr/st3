<?php

require_once "DBInit.php";

class EventDB {
    public static function insert($name, $userId, $groupId, $date, $location, $about) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO event (name, userId, groupId, date, location, about)
            VALUES (:name, :userId, :groupId, :date, :location, :about)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":userId", $userId);
        $statement->bindParam(":groupId", $groupId);
        $statement->bindParam(":date", $date);
        $statement->bindParam(":location", $location);
        $statement->bindParam(":about", $about);
        $statement->execute();
    }


    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT name, eventId, userId, groupId, location, date, about 
            FROM event");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getEventDATA($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT name, eventId, userId, groupId, location, date, about FROM event WHERE eventId = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function getGroupEvents($id) {
        $db = DBInit::getInstance();

        $one = $id["group1"];
        $two = $id["group2"];
        $three = $id["group3"];

        $statement = $db->prepare("SELECT name, eventId, userId, groupId, location, date, about FROM event 
        WHERE groupId = :id1 OR groupId = :id2 OR groupId = :id3");

        $statement->bindParam(":id1", $one);
        $statement->bindParam(":id2", $two);
        $statement->bindParam(":id3", $three);

        $statement->execute();

        return $statement->fetchall();  
    }

    public static function getAcceptedEvents($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT name, eventId, userId, groupId, location, date, about FROM event WHERE eventId = ANY ( 
            SELECT eventId FROM alerts WHERE acc = 2 AND userId = :id)");

        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetchall();  
    }


    public static function getId() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT eventId FROM event ORDER BY eventId DESC LIMIT 1");

        $statement->execute();

        return $statement->fetch(0);  
    }
}
