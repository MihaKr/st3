<!DOCTYPE html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">

<?php include("view/menu.php"); ?>
<h1>Add new Event</h1>

<form action="<?= BASE_URL . "event/add" ?>" method="post">
    <p><label>Event Name: <input type="text" name="name" value="<?= $name ?>"     
    oninvalid="this.setCustomValidity('Manjka ime dogodka')"
    oninput="this.setCustomValidity('')"
    required autofocus /></label></p>

    <p><label>Group: <input type="text" name="groupId" value="<?= $groupId ?>" pattern="^[0-9A-Za-z]+$" 
    oninvalid="this.setCustomValidity('Ime skupine mora biti ena beseda')"
    oninput="this.setCustomValidity('')" required/></label></p>

    <p><label>Location: <input type="text" name="location" value="<?= $location ?>"     
    oninvalid="this.setCustomValidity('Manjka kraj dogodka')"
    oninput="this.setCustomValidity('')" required></label></p>

    <p><label>Date: <input type="date" name="date" value="<?= $date ?>" required 
    oninvalid="this.setCustomValidity('Manjka datum dogodka')"
    oninput="this.setCustomValidity('')" ></label></p>

    <p><label>About: <input type="textarea" name="about" value="<?= $about ?>" required     
    oninvalid="this.setCustomValidity('Manjka opis dogodka')"
    oninput="this.setCustomValidity('')"  ></label></p>
    
    <p><button>Insert</button></p>
</form>
