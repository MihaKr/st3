<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "login.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">


<meta charset="UTF-8" />
<title>Edit Profile</title>

<?php include("view/menu.php"); ?>

<h1>Edit Profile</h1>

<div class = "rcorners1">
    <form action="<?= BASE_URL . "user/edit" ?>" method="post" id = "edit">
        <input type="hidden" name="userId" value="<?= $user["userId"] ?>"  />
        <input type="hidden" name="password" value="<?= $user["password"] ?>"  />

        <div class="row">
            <div class="col-25">
                <label>name: </label>
            </div>
            <div class="col-75">
                <input type="text" name="name" value="<?= $user["name"] ?>" autofocus />
            </div>
        </div> 
        <div class="row">
            <div class="col-25">   
                <label>group1: </label>
            </div>
            <div class="col-75">
                <input type="number" id="group1" name="group1" value="<?= $user["group1"] ?>" min="1" />
            </div>    
        </div>    
        <div class="row">
            <div class="col-25">   
                <label>group2: </label>
            </div>
            <div class="col-75">
                <input type="number" id="group2" name="group2" value="<?= $user["group2"] ?>" min="1"/>
            </div>
        </div>    
        <div class="row">
            <div class="col-25"> 
                <label>group3: </label>
            </div>
            <div class="col-75">
                <input type="number" id="group3" name="group3" value="<?= $user["group3"] ?>" min="1"/>
            </div>
        <button class ="button1">Update User Profile</button>
    </form>
</div>

<p id = groupAlert1> </p>
<p id = groupAlert2> </p>
<p id = groupAlert3> </p>

<script>

    $("#group1").change(function() {
        console.log("todela");
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL . "group/getList" ?>",
            dataType: 'html', 
            success: function(data) {
                neki = []
                let x = JSON.stringify(data);
                let vmes = x.split(",");

                for(let i = 0; i < vmes.length; i++) {
                    let numb = vmes[i].replace(/\D+/g, "");
                    neki.push(numb);
                }

                let val = document.forms["edit"]["group1"].value;
                if (neki.includes(val)) {
                    let par = document.getElementById("groupAlert1");
                    par.textContent = "Skupina v polju 1 obstaja";
                }
                else {
                    let par = document.getElementById("groupAlert1");
                    par.textContent = "Skupina v polju 1 ne obstaja";
                }
            }, 
        });
     });

     $("#group2").change(function() {
        console.log("todela");
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL . "group/getList" ?>",
            dataType: 'html', 
            success: function(data) {
                neki = []
                let x = JSON.stringify(data);
                let vmes = x.split(",");

                for(let i = 0; i < vmes.length; i++) {
                    let numb = vmes[i].replace(/\D+/g, "");
                    neki.push(numb);
                }

                let val = document.forms["edit"]["group2"].value;
                if (neki.includes(val)) {
                    let par = document.getElementById("groupAlert2");
                    par.textContent = "Skupina v polju 2 obstaja";
                }
                else {
                    let par = document.getElementById("groupAlert2");
                    par.textContent = "Skupina v polju 2 ne obstaja";
                }
            }, 
        });
     });

     $("#group3").change(function() {
        console.log("todela");
        $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL . "group/getList" ?>",
            dataType: 'html', 
            success: function(data) {
                neki = []
                let x = JSON.stringify(data);
                let vmes = x.split(",");

                for(let i = 0; i < vmes.length; i++) {
                    let numb = vmes[i].replace(/\D+/g, "");
                    neki.push(numb);
                }

                let val = document.forms["edit"]["group3"].value;
                if (neki.includes(val)) {
                    let par = document.getElementById("groupAlert3");
                    par.textContent = "Skupina v polju 3 obstaja";
                }
                else {
                    let par = document.getElementById("groupAlert3");
                    par.textContent = "Skupina v polju 3 ne obstaja";
                }
            }, 
        });
     });

 </script>