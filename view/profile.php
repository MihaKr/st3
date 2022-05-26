<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>
<div class="card">
    <ul>
        <li>user ID: <b><?= $user["userId"] ?></b></li>
        <li>username: <b><?= $user["name"] ?></b></li>
        <li>group1: <b><?= $user["group1"] ?></b></li>
        <li>group2: <b><?= $user["group2"] ?></b></li>
        <li>group3: <b><?= $user["group3"] ?></b></li>
    </ul>
</div>

<button type="button" id="edit">EDIT</button><br>
<form action="<?= BASE_URL . "group/add" ?>" method="post">
    <p><label>Group Name: <input type="text" name="name" value="<?= $GRname ?>" autofocus /></label></p>
    <p><button id="create">CREATE GROUP</button></p>
</form>


<script>
$(document).ready(() => {
    $("#edit").click(function() {
        document.location.href = "<?= BASE_URL . "user/edit" ?>"
    });
    
    $("#create").click(function() {
        document.location.href = "<?= BASE_URL . "group/create" ?>"
    });
});
</script>

