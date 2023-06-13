<!DOCTYPE>
<html>
  <style>
    table,th,td{
      border:1px solid black;
    
    }
    th, td {
  background-color: #96D4D6;
  border-style: solid;
  
}
    </style>
<body>
<h1>DISPLAY OF THE INSERTED DATA</h1>


<?php
require_once("dbconnection.php");

//Posts items in the database 

$PatientSSN = $_POST["ssn"];
$FirstName = $_POST["fname"];
$LastName = $_POST["lname"];
$PatientAddress = $_POST["address"];
$PatientAge = $_POST["age"];
//$PatientPrescription = $_POST["pres"];
//$DrugPrescribed= $_POST["drugp"];
$PatientPrescription = isset($_POST["pres"]) ? $_POST["pres"] : "";
$DrugPrescribed = isset($_POST["drugp"]) ? $_POST["drugp"] : "";
$DrugSSN= $_POST["drug"];

//Inserts the record in the database 

$sql = "INSERT INTO patients (`PatientSSN`, `firstname`, `lastname`, `Address`, `Age`,`PatientPrescription`,`DrugPrescribed`,`DrugSSN`)
        VALUES ('$PatientSSN', '$FirstName', '$LastName', '$PatientAddress', '$PatientAge','$PatientPrescription','$DrugPrescribed','$DrugSSN')";

if (mysqli_query($conn, $sql)) {
  echo "Record inserted successfully";
} else {
  echo "Could not insert record: " . mysqli_error($conn);
}

// Prepare the SQL statement
$stmt = $conn->prepare("SELECT * FROM patients WHERE PatientSSN = ? AND firstname = ? AND lastname = ? AND Address = ? AND Age = ? AND PatientPrescription = ? AND DrugPrescribed= ? AND DrugSSN = ?");
$stmt->bind_param("ssssssss", $PatientSSN, $FirstName, $LastName, $PatientAddress, $PatientAge,$PatientPrescription,$DrugPrescribed,$DrugSSN);

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();


if ($result) {
    if ($result->num_rows > 0) {
        // Generate the table
        echo '<table style="width:100%">
            <tr>
                <th>Patient SSN</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Patient Address</th>
                <th>Patient Age</th>
                <th style="width:400%">Patients Prescription</th>
                <th>Drug Prescribed</th>
                <th>Drug SSN</th>

            </tr>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['PatientSSN']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['lastname']."</td>
                    <td>".$row['Address']."</td>
                    <td>".$row['Age']."</td>
                    <td>".$row['PatientPrescription']."</td>
                    <td>".$row['DrugPrescribed']."</td>
                    <td>".$row['DrugSSN']."</td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "No records found.";
    }
} else {
    echo "Error retrieving records: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();


?>
</body>
</html>

