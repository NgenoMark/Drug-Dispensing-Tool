<?php
 session_start();
 include "dbconnection.php" ;

 if (isset($_POST['uname']) && isset($_POST['pass'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['pass']);

 if(empty($uname)){
    header ("Location:Doctor.php?error=User name is empty");
    exit ();
 }else if(empty($pass)){
    header("Location:Doctor.php?error= Password is required ");
    exit ();
 }

 $sql = "SELECT * FROM login WHERE username = '$uname' && password = '$pass' ";


 $result = mysqli_query($conn,$sql);
 
 if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['username'] === $uname && ($row['password'] === $pass )){
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        header("Location:doctorssummary.php");
        exit();
    }
    else{

          header("Location:Doctor.php?error=Incorrect Username or Password ");
          exit () ;
          
        }
}

    else {
        header ( "Location:Doctor.php");
        exit (); 
    }
}
 