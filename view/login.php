<!DOCTYPE html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
<script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>

<script src="login.js"></script>

<meta charset="UTF-8" />
<title>Login form</title>

<h1>Please log in</h1>

<div id="Login"></div>


<form action="<?= BASE_URL . "user/login" ?>" method="post">
    <p>
        <label>Username: <input type="text" name="username" autocomplete="off" 
            required autofocus /></label><br/>
        <label>Password: <input type="password" name="password" required /></label>
    </p>
    <p><button>Log-in</button></p>
</form>
<p><button id= "reg">Register</button></p>
<script>
    $("#reg").click(function() {
        document.location.href = "<?= BASE_URL . "user/register" ?>"
    });
    </script>
