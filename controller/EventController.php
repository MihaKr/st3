<?php

require_once("model/EventDB.php");
require_once("model/GroupDB.php");

require_once("ViewHelper.php");

class EventController {

    public static function showAddForm($values = ["name" => "", "groupId" => "", "location" => "", "date" => "", "about" => ""]) {
        ViewHelper::render("view/event-add.php", $values);
    }

    public static function add() {
        $gr = GroupDB::getID($_POST["groupId"]);
        $ur = $_SESSION['userId'];

        $validData = isset($_POST["name"]) && !empty($_POST["name"]) && 
                isset($ur) && !empty($ur) &&
                isset($gr) && !empty($gr) &&
                isset($_POST["date"]) && !empty($_POST["date"]) &&
                isset($_POST["location"]) && !empty($_POST["location"]) &&
                isset($_POST["about"]) && !empty($_POST["about"]);
        if ($validData) {
            EventDB::insert($_POST["name"], $ur, $gr, $_POST["date"], $_POST["location"], $_POST["about"]);
            $eventId = EventDB::getId();

            AlertController::send_alerts($gr, $eventId);
            AlertController::autoAccept();

            ViewHelper::redirect(BASE_URL . "event");
        } else {
            self::showAddForm($_POST);
        }
    }

    public static function event_details() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/event.php", ["event" => EventDB::getEventDATA($_GET["id"])]);
        } else {
            $ur = $_SESSION['userId'];
            ViewHelper::render("view/event-all.php", ["event" => EventDB::getAcceptedEvents($ur)]);
        }
    }
}