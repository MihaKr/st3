<!DOCTYPE html>


<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "login.css" ?>">
<link rel="stylesheet" type="text/css" href="<?= ASSETS_URL . "profile.css" ?>">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta charset="UTF-8" />
<title>register</title>

<h1>Add a new User</h1>

<div class="rcorners1" id="reg-form">
    <form action="<?= BASE_URL . "user/register" ?>" method="post">
        <div class="row">
            <div class="col-25">
                <label>Username: </label>
            </div>
            <div class="col-75">
                <input type="text" name="name" autofocus required              
                oninvalid="this.setCustomValidity('enter username')"
                oninput="this.setCustomValidity('')" />
            </div>
        </div>  
        
        <div class="row">
            <div class="col-25">
                <label>Password: </label>
            </div>  
            <div class="col-75">
                <input type="password" name="password" required               
                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
                oninvalid="this.setCustomValidity('password must contain 8 character, at least one letter, one nubmer and a special character (@,$,!,%,*,#,?,&)')"
                oninput="this.setCustomValidity('')"  />
            </div>
        </div>
    
        <button class="button1">Register</button>
    </form>
        <div class="centerB">
            <button class= "button1" id= "LOG">Return to login</button>
        </div>
    </div>

<script>
    $(document).ready(() => {
        $("#LOG").click(function() {
            document.location.href = "<?= BASE_URL . "" ?>"
        });
    });
</script>

