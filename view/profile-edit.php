<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . " calendar.css" ?>">
<meta charset="UTF-8" />
<title>Edit entry</title>

<h1>Edit Profile</h1>

<?php include("view/menu-links.php"); ?>

<form action="<?= BASE_URL . "user/edit" ?>" method="post">
    <input type="hidden" name="userId" value="<?= $user["userId"] ?>"  />
    <input type="hidden" name="password" value="<?= $user["password"] ?>"  />

    <p><label>name: <input type="text" name="name" value="<?= $user["name"] ?>" autofocus /></label></p>
    <p><label>group1: <input type="number" name="group1" value="<?= $user["group1"] ?>" /></label></p>
    <p><label>group2: <input type="number" name="group2" value="<?= $user["group2"] ?>" /></label></p>
    <p><label>group3: <input type="number" name="group3" value="<?= $user["group3"] ?>" /></label></p>
    <p><button>Update record</button></p>
</form>