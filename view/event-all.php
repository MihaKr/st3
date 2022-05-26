<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "lists.css" ?>">


<?php include("view/menu.php"); ?>
<title>User Profile</title>

<?php foreach ($event as $event): ?>
    <div class="danger">
        <li><a href="<?= BASE_URL . "event?id=" . $event["eventId"] ?>"><?= $event["name"] ?>: <?= $event["userId"] ?>, <?= $event["groupId"] ?>, <?= $event["location"] ?>, <?= $event["date"] ?>, <?= $event["about"] ?></a></li>
    </div>

    <table>
  <thead>
   <tr>
     <th>Header 1</th>
     <th>Header 2</th>
     <th>Header 3</th>
     <th>Header 4</th>
   </tr>
</thead>
  <tr>
    <td>Cell1 </td>
    <td>Cell2 </td>
    <td>Cell3 </td>
    <td>Cell 4</td>
  </tr>
  <tr>
     <td>Row 2, Cell1</td>
     <td>Row 2, C2</td>
     <td>Row 2, C3</td>
     <td>Row 2, C4</td>
  </tr>
</table>

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
