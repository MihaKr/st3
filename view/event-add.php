<!DOCTYPE html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">

<?php include("view/menu.php"); ?>
<h1>Add new Event</h1>

<form action="<?= BASE_URL . "event/add" ?>" method="post">
    <p><label>Event Name: <input type="text" name="name" value="<?= $name ?>" autofocus /></label></p>
    <p><label>Group: <input type="text" name="groupId" value="<?= $groupId ?>" /></label></p>
    <p><label>Location: <input type="text" name="location" value="<?= $location ?>" /></label></p>
    <p><label>Date: <input type="date" name="date" value="<?= $date ?>" /></label></p>
    <p><label>About: <input type="textarea" name="about" value="<?= $about ?>" /></label></p>
    <p><button>Insert</button></p>
</form>

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
});
</script>
