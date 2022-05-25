<?php

require_once "DBInit.php";

class UserDB {
    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT userId, name, groupId FROM user");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function validLoginAttempt($username, $password) {
        $dbh = DBInit::getInstance();

        // !!! NEVER CONSTRUCT SQL QUERIES THIS WAY !!!
        // INSTEAD, ALWAYS USE PREPARED STATEMENTS AND BIND PARAMETERS!
                $stmt = $dbh->prepare("SELECT COUNT(userId) FROM user WHERE name = ? AND password = ?");

                $stmt->execute(array($username, $password));

                return $stmt->fetchColumn(0) == 1;  
    }

    public static function addUser($name, $password) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO user (name, password) VALUES (:name, :password)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":password", $password);

        $statement->execute();
    }

    public static function getId($name) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT userId FROM user WHERE name = :name");
        $statement->bindParam(":name", $name);

        $statement->execute();

        return $statement->fetchColumn(0);  
    }

    public static function getUserDATA($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT userId, name, group1, group2, group3 FROM user WHERE userId = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function getGroups($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT group1, group2, group3 FROM user WHERE userId = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }

    public static function update($userId, $name, $group1, $group2, $group3) {
        $db = DBInit::getInstance();


        $statement = $db->prepare("UPDATE user SET name = :name,
        group1 = :group1, group2 = :group2, group3 = :group3 WHERE userId = :userId");
        
        $statement->bindParam(":userId", $userId);

        $statement->bindParam(":name", $name);

        $statement->bindParam(":group1", $group1);

        $statement->bindParam(":group1", $group2);

        $statement->bindParam(":group1", $group3);


        $statement->execute();
    }

    public static function getUserDATAAll($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT userId, name, group1, group2, group3, password FROM user WHERE userId = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        return $statement->fetch(0);  
    }
}
