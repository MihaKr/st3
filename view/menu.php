<nav class="navtop">
	<div>
	    <h1>Event Calendar</h1>
        <button type="button" id="cal">Calendar</button>
        <button type="button" id="alert">Alerts</button>
        <button type="button" id="prof">Profile</button>
        <button type="button" id="newEvent">New event</button>
        <button type="button" id="logOut">Log out</button>
        <button type="button" id="evList">EventList</button>
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
