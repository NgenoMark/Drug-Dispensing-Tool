<?php
session_start();
include "dbconnection.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user_type'])) {
    // Retrieve and validate the submitted values
    $username = validate($_POST['username']);
    $password = $_POST['password'];
    $user_type = validate($_POST['user_type']);

    // Perform validation and verification based on user type
    if ($user_type === 'Doctor') {
        // Perform doctor login verification
        $sql = "SELECT * FROM doctorlogin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($password === $storedPassword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_type'] = 'Doctor';
                header("Location: doclogin.php");
                exit();
            }
        }
    } elseif ($user_type === 'Pharmacist') {
        // Perform pharmacist login verification
        $sql = "SELECT * FROM pharmacistlogin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($password === $storedPassword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_type'] = 'Pharmacist';
                header("Location: newpatient.php");
                exit();
            }
        }
    } elseif ($user_type === 'Patient') {
        // Perform patient login verification
        $sql = "SELECT * FROM patienttlogin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($password === $storedPassword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_type'] = 'Patient';
                header("Location: patientdashboard.php");
                exit();
            }
        }
    } elseif ($user_type === 'Administrator') {
        // Perform admin login verification
        $sql = "SELECT * FROM adminslogin WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            if ($password === $storedPassword) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_type'] = 'Admin';
                header("Location: adminpage.php");
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
