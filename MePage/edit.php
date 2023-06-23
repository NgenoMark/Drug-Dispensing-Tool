<?php
require_once("dbconnection.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the form data
    $PatientSSN = $_POST['ssn'];
    $FirstName = $_POST['fname'];
    $LastName = $_POST['lname'];
    $PatientAddress = $_POST['address'];
    $PatientAge = $_POST['age'];
    $PatientPrescription = $_POST['pres'];
    $DrugPrescribed = $_POST['drugp'];
    $DrugSSN = $_POST['drug'];

    // Update the record in the database
    $sql = "UPDATE patients SET 
                firstname = '$FirstName',
                lastname = '$LastName',
                Address = '$PatientAddress',
                Age = '$PatientAge',
                PatientPrescription = '$PatientPrescription',
                DrugPrescribed = '$DrugPrescribed',
                DrugSSN = '$DrugSSN'
            WHERE PatientSSN = '$PatientSSN'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        // Redirect to the page displaying all patients after successful update
        header("Location: fetch.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch the user's data based on SSN
if (isset($_GET['ssn'])) {
    $PatientSSN = $_GET['ssn'];

    $sql = "SELECT * FROM patients WHERE PatientSSN='$PatientSSN'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

?>

<!-- Display the edit form with pre-filled user data -->
<form method="POST" action="">
    <input type="hidden" name="ssn" value="<?php echo $row['PatientSSN']; ?>">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" value="<?php echo $row['firstname']; ?>"><br>
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" value="<?php echo $row['lastname']; ?>"><br>
    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo $row['Address']; ?>"><br>
    <label for="age">Age:</label>
    <input type="text" name="age" value="<?php echo $row['Age']; ?>"><br>
    <label for="pres">Patient Prescription:</label>
    <input type="text" name="pres" value="<?php echo $row['PatientPrescription']; ?>"><br>
    <label for="drugp">Drug Prescribed:</label>
    <input type="text" name="drugp" value="<?php echo $row['DrugPrescribed']; ?>"><br>
    <label for="drug">Drug SSN:</label>
    <input type="text" name="drug" value="<?php echo $row['DrugSSN']; ?>"><br>
    <input type="submit" name="submit" value="Update">
</form>
