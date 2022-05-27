<!DOCTYPE html>


<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "calendar.css" ?>">
<meta charset="UTF-8" />
<title>register</title>

<h1>Add a new User</h1>

<form action="<?= BASE_URL . "user/register" ?>" method="post">
    <p><label>Username: <input type="text" name="name" autofocus required              
        oninvalid="this.setCustomValidity('Vpišite uporabniško ime')"
        oninput="this.setCustomValidity('')" />
    </label></p>

    <p><label>Password: <input type="passwords" name="password" required               
        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
        oninvalid="this.setCustomValidity('geslo mora vsebovati vsaj 8 znakov, eno črko, eno številko in en poseben znak')"
        oninput="this.setCustomValidity('')"  /></label></p>
    <p><button>Insert</button></p>
</form>
