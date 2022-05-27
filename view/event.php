<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">

<title>User Profile</title>

<ul>
    <li>Event Id: <b><?= $event["eventId"] ?></b></li>
    <li>Dogodek: <b><?= $event["name"] ?></b></li>
    <li>Ogranizator: <b><?= $event["userId"] ?></b></li>
    <li>Skupina: <b><?= $event["groupId"] ?></b></li>
    <li>Kraj: <b><?= $event["location"] ?></b></li>
    <li>Datum: <b><?= $event["date"] ?></b></li>
    <li>Dodatne informacije: <b><?= $event["about"] ?></b></li>
</ul>
