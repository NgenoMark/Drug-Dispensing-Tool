<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login </title>
    </head>
<body>

<form action="Plogin.php" method="post">


    <img src="download.jpg"  alt="PHARMACYLOGO"  style="width:250px;height:250px;">

    <h1 style ="font-size:40px">PHARMACISTS LOGIN PAGE </h1>

    <?php if(isset($_GET['error'])) { ?>
        <p class = "error"> <?php echo $_GET['error']; ?></p>
        <?php 
    } ?>
    
    <label for="ssn">USERNAME/SSN</label><br>
    <input type="text" id="ssn" name="uname"  required autofocus autocomplete="on"><br>


    <label for="pass">PASSWORD</label><br>
    <input type ="password" id="pass" name="pass" ><br><br>

    <button type = "submit">Login</button> 
    <input type="reset">

</form>

</body>
</html>
