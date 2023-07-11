<?php
/* This is the database connection for our application */


$servername = "localhost";
$username  = "root";
$password = "";
$dbname  = "drugdispensingtool";

$conn = mysqli_connect($servername , $username ,$password , $dbname );

if(!$conn){
    echo "Connection failed";
}else{
    echo "connection successful !";
}

?>
 