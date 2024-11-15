<?php
require_once('dbconnection.php');

if (isset($_GET['ssn'])) {
    $PatientSSNToEdit = $_GET['ssn'];

    // Check if the update form is submitted
    if (isset($_POST['update'])) {
        $FirstName = $_POST['fname'];
        $LastName = $_POST['lname'];
        $Patientillness = $_POST['illness'];
        $DrugsPrescribed = $_POST['drugp'];

        // Prepare the SQL statement to update the record
        $updateStmt = $conn->prepare("UPDATE doctorsummary SET FirstName = ?, LastName = ?, Patientillness = ?, DrugsPrescribed = ? WHERE PatientSSN = ?");
        $updateStmt->bind_param("sssss", $FirstName, $LastName, $Patientillness, $DrugsPrescribed,  $PatientSSNToEdit);

        // Execute the update statement
        if ($updateStmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $updateStmt->error;
        }

        // Close the update statement
        $updateStmt->close();

        // Redirect to fetch.php
        header("Location: fetch.php");
        exit();
    }

    // Prepare the SQL statement to fetch the record
    $selectStmt = $conn->prepare("SELECT * FROM doctorsummary WHERE PatientSSN = ?");
    $selectStmt->bind_param("s", $PatientSSNToEdit);

    // Execute the select statement
    if ($selectStmt->execute()) {
        $result = $selectStmt->get_result();
        $row = $result->fetch_assoc();

        if ($row) {
            $FirstName = $row['FirstName'] ?? '';
            $LastName = $row['LastName'] ?? '';
            $Patientillness = $row['Patientillness'] ?? '';
            $DrugsPrescribed = $row['DrugsPrescribed'] ?? '';

            // Display the form with the fetched values
            echo '
                <form method="POST">
                    First Name: <input type="text" name="fname" value="'.htmlspecialchars($FirstName).'"><br>
                    Last Name: <input type="text" name="lname" value="'.htmlspecialchars($LastName).'"><br>
                    Patient illness: <textarea name="illness" rows="5" cols="30">'.htmlspecialchars($Patientillness).'</textarea><br>
                    Drug Prescribed: <textarea name="drugp" rows="5" cols="30">'.htmlspecialchars($DrugsPrescribed).'</textarea><br>
                    <button type="submit" name="update">Update</button>
                </form>';
        } else {
            echo "No record found for the given SSN.";
        }
    } else {
        echo "Error fetching record: " . $selectStmt->error;
    }

    // Close the select statement
    $selectStmt->close();
}
$conn->close();
?>
