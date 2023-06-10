 <?php

 session_start();

 if(isset($_SESSION['username']) && (isset($_SESSION['password']))){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <h1>Welcome ,<?php echo $_SESSION['username']; ?> </h1>
    <a href="logout.php"> Logout  </a>
    <a href = "patient.php"> Patient </a>
        
    </body>
    </html>

    <?php

 }
 else{
    header ("Location:index.php") ;
    exit();
 }
 ?>