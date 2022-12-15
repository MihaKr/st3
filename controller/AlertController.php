<?php

require_once("model/EventDB.php");
require_once("model/GroupDB.php");
require_once("model/AlertDB.php");


require_once("ViewHelper.php");

class AlertController {
    public static function alert_details() {
        if (isset($_GET["id"])) {
            $event = AlertDB::getAlertDATA($_GET["id"]);
            $event["userId"] = UserDB::getName($event["userId"])["name"];
            $event["groupId"] = GroupDB::getGroupName($event["groupId"])["groupName"];

            ViewHelper::render("view/alert.php", ["event" => $event]);
        } else {
            $uId = $_SESSION['userId'];
            ViewHelper::render("view/alert-list.php", ["event" => AlertDB::getAlerts($uId), "alertId" => AlertDB::getAId($uId)]);
        }
    }

    public static function send_alerts($group, $eventId) {
        $ur = $_SESSION['userId'];

        $sendTo = AlertDB::getUserId($group);

        $length = count($sendTo);

        for ($i = 0; $i < $length; $i++) {
            $uId = $sendTo[$i]["userId"];
            AlertDB::send($uId, $eventId["eventId"]);
        }

        $Aid = AlertDB::getCreatorId($ur);

        self::accept($Aid);
    }

    public static function autoAccept() {
        $ur = $_SESSION['userId'];
        $Aid = AlertDB::getCreatorId($ur);

        AlertController::accept($Aid['alertId']);
        echo("test");
    }


    public static function accept($alertId) {
        AlertDB::accept($alertId);
        $uId = $_SESSION['userId'];
    }

    public static function decline($alertId) {
        AlertDB::decline($alertId);
        $uId = $_SESSION['userId'];
    }
}

