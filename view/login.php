<!DOCTYPE html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "login.css" ?>">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">

    <meta charset="UTF-8" />
    <title>Login form</title>
</head>

<body>
    <h1>Please log in</h1>

    <div class="rcorners1" id="login-form">
        <form action="<?= BASE_URL . "user/login" ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label>Username: </label> 
            </div>
            <div class="col-75">
                <input type="text" id="username" name="username" autocomplete="off" 
                oninvalid="this.setCustomValidity('enter username')"
                oninput="this.setCustomValidity('')" required autofocus />
            </div>
        </div>    
        <div class="row">
            <div class="col-25">
                <label>Password: </label>
            </div>
            <div class="col-75">
                <input type="password" id="passwords" name="password"     
                oninvalid="this.setCustomValidity('enter password')"
                oninput="this.setCustomValidity('')" required />
            </div>
        </div>
            <button class= "button1" id="submit">Log-in</button>
        </form>
        <div class="centerB">
            <button class= "button1" id= "reg">Register</button>
        </div>
        <div class="group check">
            <form action="<?= BASE_URL . "anon/check" ?>" method="post">
                <div class="col-25">
                    <label>Or check a group's events</label>
                </div>
            <div class="row">
                <div class="col-75">
                    <input type="number" id="group" name="groupcheck" placeholder="Group ID" min=0>
                </div>
                <button class= "button1" id="checkEvents">check group events</button>
            </div>    
            </form>
        </div>
    </div>
</body>

<script>
    $("#reg").click(function() {
        document.location.href = "<?= BASE_URL . "user/register" ?>"
    });
    $("#recheckEventsg").click(function() {
        document.location.href = "<?= BASE_URL . "anon/group" ?>"
    });
    </script>
</body>
