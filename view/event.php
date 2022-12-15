<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">

<title>Event data</title>

<ul>
    <li>Event Id: <b><?= $event["eventId"] ?></b></li>
    <li>Event: <b><?= $event["name"] ?></b></li>
    <li>Organizer: <b><?= $event["userId"] ?></b></li>
    <li>Group: <b><?= $event["groupId"] ?></b></li>
    <li>Location: <b><?= $event["location"] ?></b></li>
    <li>Date: <b><?= $event["date"] ?></b></li>
    <li>Description: <b><?= $event["about"] ?></b></li>
</ul>
