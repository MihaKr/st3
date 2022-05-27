<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "lists.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "modal.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>

<div id="myModal" class="modal">
<button id="close">close</button>
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
    <div class="container">
        <button id= "ev<?php echo $id?>"> event</button>
    </div>

    <script>
        $("#ev<?php echo $id?>").click(function(){
            $('#content').load("<?php echo $url; ?>");
            modal.style.display = "block";
        });

    </script>
<?php endforeach; ?>
