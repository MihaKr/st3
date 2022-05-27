<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "menu.css" ?>">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<nav class="navtop">
	<div>
	    <h1>MeetUp</h1>
        <button class="button" id="cal">Calendar</button>
        <button class="button" id="alert">Alerts</button>
        <button class="button" id="prof">Profile</button>
        <button class="button" id="newEvent">New event</button>
        <button class="button" id="logOut">Log out</button>
        <button class="button" id="evList">EventList</button>
	 </div>
</nav>

<script>
$(document).ready(() => {
    $("#cal").click(function() {
        document.location.href = "<?= BASE_URL . "user/calendar" ?>"
    });
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
