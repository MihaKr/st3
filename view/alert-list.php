<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . " calendar.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>

<?php $counter = 0 ?>

<?php foreach ($event as $ev): ?>
    <li><a href="<?= BASE_URL . "alert?id=" . $alertId[$counter]["alertId"] ?>"><?= $ev["name"] ?>: <?= $ev["userId"] ?>, <?= $ev["groupId"] ?>, <?= $ev["location"] ?>, <?= $ev["date"] ?>, <?= $ev["about"] ?></a></li>
    <?php $counter = $counter + 1?>
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
