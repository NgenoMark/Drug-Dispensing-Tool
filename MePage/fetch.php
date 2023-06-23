<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        th, td {
            background-color: #96D4D6;
            border-style: solid;
        }
    </style>
</head>
<body>
    <h2>DISPLAY OF ALL PATIENTS DETAILS IN THE DATABASE</h2>

    <?php
    require_once('dbconnection.php');

    // Check if the delete form is submitted
    if (isset($_POST['delete'])) {
        $PatientSSNToDelete = $_POST['delete_ssn'];

        // Prepare the SQL statement to delete the record
        $deleteStmt = $conn->prepare("DELETE FROM patients WHERE PatientSSN = ?");
        $deleteStmt->bind_param("s", $PatientSSNToDelete);

        // Execute the delete statement
        if ($deleteStmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $deleteStmt->error;
        }

        // Close the delete statement
        $deleteStmt->close();
    }

    $sql = "SELECT * FROM patients";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        echo '<table>
            <tr>
                <th>Patient SSN</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Patient Address</th>
                <th>Patient Age</th>
                <th>Patient Prescription</th>
                <th>Drug Prescribed</th>
                <th>Drug SSN</th>
                <th>Action</th>
            </tr>';

        while ($row = $results->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['PatientSSN']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['lastname']."</td>
                    <td>".$row['Address']."</td>
                    <td>".$row['Age']."</td>
                    <td>".$row['PatientPrescription']."</td>
                    <td>".$row['DrugPrescribed']."</td>
                    <td>".$row['DrugSSN']."</td>
                    <td><a href='edit.php?ssn=".$row['PatientSSN']."'>Edit</a></td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "No records found.";
    }
    ?>

    <form method="POST">
        <label for="delete_ssn">Enter Patient SSN to delete:</label>
        <input type="text" name="delete_ssn" id="delete_ssn">
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>
