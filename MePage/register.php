<?php
session_start();
include("dbconnection.php");
// Assuming you have a database connection established

// Retrieve the form data
$userType = $_POST["user"];
$username = $_POST["username"];
$password = $_POST["password"];

// Perform any necessary validation on the form data

// Determine the table based on the user type
$tableName = ($userType === "Doctor") ? "doctorlogin" : "pharmacistlogin";

// Insert the user into the corresponding table
$sql = "INSERT INTO $tableName (`username`, `password`) VALUES ('$username', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "User registered successfully!";
} else {
    echo "Error registering user: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
