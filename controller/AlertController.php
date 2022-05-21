<?php

require_once("model/EventDB.php");
require_once("model/GroupDB.php");
require_once("model/AlertDB.php");


require_once("ViewHelper.php");

class AlertController {
    public static function alert_details() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/alert.php", ["event" => AlertDB::getAlertDATA($_GET["id"])]);
        } else {
            session_start();
            $uId = $_SESSION['userId'];
            ViewHelper::render("view/alert-list.php", ["event" => AlertDB::getAlerts($uId), "alertId" => AlertDB::getAId($uId)]);
        }
    }

    public static function send_alerts($group, $eventId) {
        $sendTo = AlertDB::getUserId($group);

        $length = count($sendTo);

        for ($i = 0; $i < $length; $i++) {
            $uId = $sendTo[$i]["userId"];
            AlertDB::send($uId, $eventId["eventId"]);
        }
    }

    public static function accept($alertId) {
        AlertDB::accept($alertId);
    }

    public static function decline($alertId) {
        AlertDB::decline($alertId);
    }
}

