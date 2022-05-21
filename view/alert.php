<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . " calendar.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>

<ul>
    <li>userId: <b><?= $event["eventId"] ?></b></li>
    <li>username: <b><?= $event["name"] ?></b></li>
    <li>user: <b><?= $event["userId"] ?></b></li>
    <li>group: <b><?= $event["groupId"] ?></b></li>
    <li>location: <b><?= $event["location"] ?></b></li>
    <li>date: <b><?= $event["date"] ?></b></li>
    <li>about: <b><?= $event["about"] ?></b></li>
</ul>

<?php 
$url = "$_SERVER[REQUEST_URI]";

$id = explode("=", $url);

?>
<button type="button" id="yes">Accept</button>
<button type="button" id="no">Decline</button>

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

    $.ajax({ url: '/my/site',
         data: {action: 'test'},
         type: 'post',
         success: function(output) {
            alert(output);
        }
    });


    $("#yes").click(function(){
        $.post("<?= BASE_URL . "event" ?>", 
            { id: $(this).data("id") },
                AlertController::accept($id);
        );
    });

    $("#no").click(function(){
        $.post("<?= BASE_URL . "event" ?>", 
            { id: $(this).data("id") },
                AlertController::decline($id);
        );
    });
});
</script>
