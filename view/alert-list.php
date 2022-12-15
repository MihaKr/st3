<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "anon.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "modal.css" ?>">

<?php include("view/menu.php"); ?>

<title>Alert List</title>

<h1>Alert List</h1>


<div id="myModal" class="modal">
<button class="button1" id="close">close</button>
    <div id = "content" class="modal-content">
    </div>
</div>    
<p id= "p"></p>

<script>
    let modal = document.getElementById("myModal");

    $("#close").click(function(){
        modal.style.display = "none";
    });


</script>

<?php $counter = 0 ?>

<?php foreach ($event as $event): ?>

    <?php $url = BASE_URL . "alert?id=" . $alertId[$counter]["alertId"]; ?>

    <?php $id = $alertId[$counter]["alertId"]?>
    <div class="container col-6">
        <button class="button1" id= "ev<?php echo $id?>"> <?php echo $event["name"]?> <?php echo $event["date"]?></button>
    </div>

    <script>
        $("#ev<?php echo $id?>").click(function(){
            $('#content').load("<?php echo $url; ?>");
            modal.style.display = "block";
        });

    </script>
    <?php $counter = $counter + 1?>

<?php endforeach; ?>

<script>
    if (<?php echo $counter?> == 0) {
        let par = document.getElementById("p");
        par.textContent = "no new alerts";
    }
</script>

