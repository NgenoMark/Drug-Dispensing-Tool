<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    
    <style>
        
  
body {
    background-image: url(images/high.jpg);
    background-color: #000;
    background-size: cover;
    background-position: center top 10%;
}

.loginbox {
    position: absolute;
    top: 50%;
    left: 20%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background-color:rgba(0, 0, 0, 0);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0);
    border-radius: 10px;
}

.loginboxh2 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
}

    </style>
</head>
<body class="body">
    <div class="loginbox">  
        <div class="loginboxh2">
            <form action="loginback.php" method="post">
                
                <h1 style="font-size:40px">LOGIN PAGE</h1>
                <?php if(isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
        </div>

        <div class="loginboxh2">
            <label for="user_type">Select User Type:</label><br>
            <select id="user_type" name="user_type">
                <option value="Doctor">Doctor</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Patient">Patient</option>
                <option value="Administrator">Administrator</option>
            </select><br>
        </div>

        <div class="loginboxh2">
            <label for="username">USERNAME</label><br>
            <input type="text" id="username" name="username" size="40" required autofocus autocomplete="on"><br><br>
        </div>

        <div class="loginboxh2">
            <label for="password">PASSWORD</label><br>
            <input type="password" id="password" name="password" size="40" required autofocus autocomplete="on"><br><br>
        </div>

        <div class="loginboxh2">
            <button type="submit">Login</button>
            <input type="reset">
        </div>
    </form>

    <div class="loginboxh2">
        <p>Don't have an account? <a href="registerf.php">Register</a></p>
        <p>Forgot your password? <a href="forgotpassword.php">Reset Password</a></p>
    </div>
    </div>
</body>
</html>