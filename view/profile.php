<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "add.css" ?>">

<?php include("view/menu.php"); ?>
<title>User Profile</title>
<h1>User Profile</h1>


<div class="card">
    <p>Current User's Data</p>
    <ul>
        <li>user ID: <b><?= $user["userId"] ?></b></li>
        <li>username: <b><?= $user["name"] ?></b></li>
        <li>group1: <b><?= $user["group1"] ?></b></li>
        <li>group2: <b><?= $user["group2"] ?></b></li>
        <li>group3: <b><?= $user["group3"] ?></b></li>
    </ul>
</div>

<div class="centerB">
    <button class="button1" type="button" id="edit">EDIT</button><br>
</div>

<div class="centerB">
    <div class="row">
        <div class="col-25">
            <label>Group Name:</label>
        </div>
        <div class="col-75">
            <input type="text" id = "groupName" autofocus />
        </div>

    <button class="button1" id="create">CREATE GROUP</button>
        <p id="p"> </p>
    </div>
</div>


<script>
    $(document).ready(() => {
        $("#edit").click(function() {
            document.location.href = "<?= BASE_URL . "user/edit" ?>"
        });

        $("#create").click(function() {
            let name = document.getElementById('groupName').value;
            $.ajax({
            type: "POST",
            url: "<?php echo BASE_URL . "group/add" ?>",
            data : { "name" : name },
            success: function() {
                let par = document.getElementById("p");
                par.textContent = "Skupina uspešno dodana";
                $.ajax({
                type: "POST",
                url: "<?php echo BASE_URL . "group/lastAdd" ?>",
                dataType: 'html', 
                success: function(data) {
                    let x = JSON.stringify(data);
                    let matches = x.match(/(\d+)/)[0];
                    $("body").append("vaš ID skupine je: " + matches);
                }, 
            });
            }
        })
        }); 
         
    });
</script>

