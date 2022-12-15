<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "modal.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "anon.css" ?>">


<title>Anonymous Group Lookup</title>

<nav class="navtop">
	<div>
	    <h1>MeetUp</h1>
        <button class="button1" id="logIn">Return To Login Page</button>
	 </div>
</nav>

<h1>Anonymous Group Lookup</h1>


<div id="myModal" class="modal">
<button class="button1" id="close">close</button>
    <div id = "content" class="modal-content">
        <span class="close">&times;</span>
    </div>
</div>    

<script>
    let modal = document.getElementById("myModal");

    $("#close").click(function(){
        modal.style.display = "none";
    });

    window.onclick = function(event) {
    if (event.target == $('#myModal')) {
        modal.style.display = "none";
        }   
    }

</script>

<?php foreach ($event as $event): ?>

<?php $url = BASE_URL . "event?id=" . $event["eventId"]; ?>
<?php $id = $event["eventId"]?>
<div class="container .col-6">
    <button class="button1" id= "ev<?php echo $id?>"> <?php echo $event["name"]?> <?php echo $event["date"]?></button>
</div>

<script>
    $("#ev<?php echo $id?>").click(function(){
        $('#content').load("<?php echo $url; ?>");
        modal.style.display = "block";
    });

</script>
<?php endforeach; ?>

<script>
$(document).ready(() => {
    $("#logIn").click(function() {
        document.location.href = "<?= BASE_URL . "" ?>"
    });
});
</script>

