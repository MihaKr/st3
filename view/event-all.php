<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "modal.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "anon.css" ?>">

<?php include("view/menu.php"); ?>
<title>Events List</title>

<h1>Event List</h1>

<div id="myModal" class="modal">
    <button class="button1" id="close">close</button>
    <div id = "content" class="modal-content">
    </div>
</div>    

<script>
    let modal = document.getElementById("myModal");

    $("#close").click(function(){
        modal.style.display = "none";
    });

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
