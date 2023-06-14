<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userType = $_POST['user'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $registrationDate = $_POST['date'];
    $gender = $_POST['gender'];

    // Validate and process the data (you can add your own validation and database logic here)

    // Display success message or redirect to another page
    echo "User registered successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="signup.php" method="POST">
        <fieldset>
            <legend>Registration Details:</legend>

            <label for="user">Choose a user:</label><br>
            <select id="user" name="user">
                <option value="Doctor">Doctor</option>
                <option value="Pharmacist">Pharmacist</option>
            </select><br><br>

            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname" required><br>

            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname" required><br>

            <label for="address">User's Address:</label><br>
            <input type="text" id="address" name="address" required><br>

            <label for="age">User's Age:</label><br>
            <input type="number" id="age" name="age" required><br>

            <label for="email">User's Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="date">Date of Registration:</label><br>
            <input type="datetime-local" id="date" name="date" required><br>

            <label for="gender">Select a gender:</label><br>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label><br>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label><br><br>

            <input type="submit" value="Sign Up">
        </fieldset>
    </form>
</body>
</html>
