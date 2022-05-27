<!DOCTYPE html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "login.css" ?>">
    <meta charset="UTF-8" />
    <title>Login form</title>
</head>

<body>
    <h1>Please log in</h1>

    <div id="login-form">
        <form action="<?= BASE_URL . "user/login" ?>" method="post">
            <p>
                <label>Username: <input type="text" id="username" name="username" autocomplete="off" 
                oninvalid="this.setCustomValidity('Vpišite uporabniško ime')"
                oninput="this.setCustomValidity('')" required autofocus />
                </label><br/>

                <label>Password: <input type="password" id="passwords" name="password"     
                oninvalid="this.setCustomValidity('Vpišite geslo')"
                oninput="this.setCustomValidity('')" required />
                </label>
            </p>
            <p><button id="submit">Log-in</button></p>
        </form>
        <div id="create-account-wrap">
            <p><button id= "reg">Register</button></p>
        </div>
        <div id="group checl">
        <input type="number" id="phone" name="phone" placeholder="Group ID">
        </div>
    </div>
</body>

<script>
    $("#reg").click(function() {
        document.location.href = "<?= BASE_URL . "user/register" ?>"
    });
    </script>
</body>
