<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "menu.css" ?>">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="topnav" id="myt">
    <button class="button" id="logOut">Log out</button>
    <button class="button" id="evList">EventList</button>
    <button class="button" id="newEvent">New event</button>
    <button class="button" id="alert">Alerts</button>
    <button class="button" id="prof">Profile</button>
    <a href="javascript:void(0);" class="icon" onclick="dropDown()">
        <i class="fa fa-bars" id="bars"></i>
    </a>
</div>

<script>
    function dropDown() {
        let x = document.getElementById("myt");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
$(document).ready(() => {
    $("#alert").click(function() {
        document.location.href = "<?= BASE_URL . "alert" ?>"
    });
    $("#evList").click(function() {
        document.location.href = "<?= BASE_URL . "event" ?>"
    });
    $("#prof").click(function() {
        document.location.href = "<?= BASE_URL . "user/profile" ?>"
    });
    $("#newEvent").click(function() {
        document.location.href = "<?= BASE_URL . "event/add" ?>"
    });
    $("#logOut").click(function() {
        document.location.href = "<?= BASE_URL . "user/logout" ?>"
    });
});
</script>
