<?php
session_start();
include("dbconnection.php");

$position = $_POST["position"];
$allnames = $_POST["allnames"];
$username = $_POST["username"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$ID = $_POST["ID"];
$password = $_POST["password"];

// Rest of the code for database insertion goes here

// Perform any necessary validation on the form data

// Determine the table based on the selected position
if ($position === "Doctor") {
    $tableName = "doctorlogin";
} elseif ($position === "Patient") {
    $tableName = "patienttlogin";
} elseif ($position === "Pharmacist") {
    $tableName = "pharmacistlogin";
} elseif ($position === "Admin") {
    $tableName = "adminslogin";
} else {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Invalid position!</p>';
    exit();
}

// Check if email already exists in the database
$emailCheckQuery = "SELECT * FROM $tableName WHERE Email = '$email'";
$emailCheckResult = mysqli_query($conn, $emailCheckQuery);
if (mysqli_num_rows($emailCheckResult) > 0) {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Email already exists!</p>';
    exit();
}

// Insert the user into the corresponding table
$sql = "INSERT INTO $tableName (`allnames`, `username`, `phone`, `email`, `dob`, `ID`, `password`) 
        VALUES ('$allnames', '$username', '$phone', '$email', '$dob', '$ID', '$password')";

$sql_all = "INSERT INTO users (`allnames`, `username`, `phone`, `email`, `dob`, `ID`, `password`)
        VALUES ('$allnames', '$username', '$phone', '$email', '$dob', '$ID', '$password')";
 

 if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql_all)) {
    echo "<div id='success-alert' style='display:none;'>
            User successfully registered
          </div>
          <script>
            setTimeout(function(){
                document.getElementById('success-alert').style.display = 'block';
                setTimeout(function(){
                    window.location.href = 'loginpage.php';
                }, 1000);
            }, 1000);
          </script>";
} else {
    echo "<div id='error-alert' style='display:none;'>
            User registration Unsuccessful
          </div>
          <script>
            setTimeout(function(){
                document.getElementById('error-alert').style.display = 'block';
                setTimeout(function(){
                    window.location.href = 'your_previous_page.php';
                }, 1000);
            }, 1000);
          </script>";
}



// Close the database connection
mysqli_close($conn);
?>