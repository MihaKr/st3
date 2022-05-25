<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>

<?php foreach ($event as $event): ?>
    <li><a href="<?= BASE_URL . "event?id=" . $event["eventId"] ?>"><?= $event["name"] ?>: <?= $event["userId"] ?>, <?= $event["groupId"] ?>, <?= $event["location"] ?>, <?= $event["date"] ?>, <?= $event["about"] ?></a></li>
<?php endforeach; ?>

<script>
$(document).ready(() => {
    $("#cal").click(function() {
        document.location.href = "<?= BASE_URL . "user/calendar" ?>"
    });
    $("#evList").click(function() {
        document.location.href = "<?= BASE_URL . "event" ?>"
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
});
</script>
