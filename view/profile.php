<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . " calendar.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>

<ul>
    <li>userId: <b><?= $user["userId"] ?></b></li>
    <li>username: <b><?= $user["name"] ?></b></li>
    <li>group1: <b><?= $user["group1"] ?></b></li>
    <li>group2: <b><?= $user["group2"] ?></b></li>
    <li>group3: <b><?= $user["group3"] ?></b></li>
</ul>

<button type="button" id="edit">EDIT</button>

<script>
$(document).ready(() => {
    $("#cal").click(function() {
        document.location.href = "<?= BASE_URL . "user/calendar" ?>"
    });
    $("#prof").click(function() {
        document.location.href = "<?= BASE_URL . "user/profile" ?>"
    });
    $("#newEvent").click(function() {
        document.location.href = "<?= BASE_URL . "event/add" ?>"
    });
    $("#logOut").click(function() {
        document.location.href = "<?= BASE_URL . "user/logout" ?>"
    });
    $("#evList").click(function() {
        document.location.href = "<?= BASE_URL . "event" ?>"
    });
    $("#edit").click(function() {
        document.location.href = "<?= BASE_URL . "user/edit" ?>"
    });
});
</script>

