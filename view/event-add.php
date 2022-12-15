<!DOCTYPE html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "add.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">



<?php include("view/menu.php"); ?>
<h1>Add new Event</h1>

<div class="rcorners1">
    <form action="<?= BASE_URL . "event/add" ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label>Event Name: </label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?= $name ?>"     
                oninvalid="this.setCustomValidity('missing event name')"
                oninput="this.setCustomValidity('')"
                required autofocus />
            </div>
        </div>   
        <div class="row">
            <div class="col-25">
                <label>Group: </label>
            </div>
            <div class="col-75">
                <input type="text" name="groupId" value="<?= $groupId ?>" pattern="^[0-9A-Za-z]+$" 
                oninvalid="this.setCustomValidity('group name must be one word')"
                oninput="this.setCustomValidity('')" required/>
            </div>
        </div>  
        <div class="row">
            <div class="col-25">  
                <label>Location: </label>
            </div>    
            <div class="col-75">  
                <input type="text" name="location" value="<?= $location ?>"     
                oninvalid="this.setCustomValidity('missing event location')"
                oninput="this.setCustomValidity('')" required>
            </div>    
        </div>   
        <div class="row">
            <div class="col-25">  
                <label>Date: </label>
            </div>
            <div class="col-75">  
                <input type="date" name="date" value="<?= $date ?>" required 
                oninvalid="this.setCustomValidity('missing event date')"
                oninput="this.setCustomValidity('')" >
            </div>
        </div>    
        <div class="row">
            <div class="col-25">  
                <label>About: </label>
            </div>
            <div class="col-75">  
                <textarea name="about" value="<?= $about ?>" required     
                oninvalid="this.setCustomValidity('mising event description')"
                oninput="this.setCustomValidity('')"> </textarea>
            </div>
        </div>
        <button class="button1">Create Event</button>
    </form>
</div>
