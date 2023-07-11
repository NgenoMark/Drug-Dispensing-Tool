<?php
session_start();
include "dbconnection.php";

if (isset($_POST['uname']) && isset($_POST['pass']) && isset($_POST['user_type'])) {
    // Retrieve and validate the submitted values
    $uname = validate($_POST['uname']);
    $pass = $_POST['pass'];
    $user_type = validate($_POST['user_type']);

    // Perform validation and verification based on user type
    if ($user_type === 'Doctor') {
        // Perform doctor login verification
        $sql = "SELECT * FROM doctorslogin WHERE Username = '$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];

            if ($pass === $storedPassword) {
                $_SESSION['username'] = $row['Username'];
                $_SESSION['user_type'] = 'Doctor';
                header("Location: doctorssummary.php");
                exit();
            }
        }
    } elseif ($user_type === 'Pharmacist') {
        // Perform pharmacist login verification
        $sql = "SELECT * FROM pharmacistslogin WHERE Username = '$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];

            if ($pass === $storedPassword) {
                $_SESSION['username'] = $row['Username'];
                $_SESSION['user_type'] = 'Pharmacist';
                header("Location: newpatient.php");
                exit();
            }
        }
    } elseif ($user_type === 'Patient') {
        // Perform patient login verification
        $sql = "SELECT * FROM patientslogin WHERE Username = '$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['Password'];

            if ($pass === $storedPassword) {
                $_SESSION['username'] = $row['Username'];
                $_SESSION['user_type'] = 'Patient';
                header("Location: patientdashboard.php");
                exit();
            }
        }
    }

    // Invalid username or password
    header("Location: loginpage.php?error=Incorrect username or password");
    exit();
} else {
    // Invalid form submission
    header("Location: loginpage.php");
    exit();
}

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>