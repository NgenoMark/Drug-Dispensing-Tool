<?php
/* When a person registers the details are updated according to inserted data . This is the backend logic */
session_start();
include("dbconnection.php");
// Assuming you have a database connection established

// Retrieve the form data
$userType = $_POST["user"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

// Perform any necessary validation on the form data

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Invalid email format!</p>';
    exit();
}

// Determine the table based on the user type
if ($userType === "Doctor") {
    $tableName = "doctorslogin";
} elseif ($userType === "Pharmacist") {
    $tableName = "pharmacistslogin";
} elseif ($userType === "Patient") {
    $tableName = "patientslogin";
} else {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Invalid user type!</p>';
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
$sql = "INSERT INTO $tableName (`Email`,`Username`, `Password`) VALUES ('$email','$username', '$password')";
if (mysqli_query($conn, $sql)) {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Registration successful! Please wait...</p>';
    echo '<script>
        setTimeout(function(){
            window.location.href = "both.php";
        }, 2000);
    </script>';
} else {
    echo '<p style="font-size: 20px; background-color: #333; color: #fff; padding: 10px;">Registration not successful. Please try again.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
