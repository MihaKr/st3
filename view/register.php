<!DOCTYPE html>


<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<meta charset="UTF-8" />
<title>register</title>

<h1>Add a new User</h1>

<form action="<?= BASE_URL . "user/register" ?>" method="post">
    <p><label>Username: <input type="text" name="name" value="<?= $name ?>" autofocus /></label></p>
    <p><label>Password: <input type="text" name="password" value="<?= $password ?>" /></label></p>
    <p><button>Insert</button></p>
</form>
