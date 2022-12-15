<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "lists.css" ?>">


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

$id = explode("=", $url)[1];

?>
<button class="button1" type="button" id="yes">Accept</button>
<button class="button1" type="button" id="no">Decline</button>

<p id="p"> </p>

<script>
$(document).ready(() => {
    let id =  "<?php echo $id; ?>";  

    $("#yes").click(function() {
        $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL . 'Alert/accept' ?>",
        data : { "id" : id },
        success: function() {
            console.log("uspeh");
        }
    });
        let par = document.getElementById("p");
        par.textContent = "Vabilo na dogodek sprejeto";
    });  

    $("#no").click(function() {
        $.ajax({
        type: "POST",
        url: "<?php echo BASE_URL . 'Alert/decline' ?>",
        data : { "id" : id },
        success: function() {
            console.log("failure");
        }
    });
        let par = document.getElementById("p");
        par.textContent = "Vabilo na dogodek zavrnjeno";
    }); 

});
</script>
