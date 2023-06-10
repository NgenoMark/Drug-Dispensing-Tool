<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class = "form">
    <form action="login.php"  method = "post" >

    <h2>Login page </h2>

    <?php if(isset($_GET['error'])) { ?>
        <p class = "error"> <?php echo $_GET['error']; ?></p>
        <?php 
    } ?>

        <div class = "titles"><label>Username</label> <br>
        <input type="text" placeholder = "Username" name="uname"> <br>
        </div>

        <div class = "titles">
        <label >Password</label><br>
        <input type="password" placeholder  = "Password" name = "pass"><br>
        </div>

        <div class = "titles">
            <button type = "submit"> Login </button><br>
        </div>
    
    </form>
</div>

    
</body>
</html>