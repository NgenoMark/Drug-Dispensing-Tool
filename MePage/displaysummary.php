<!DOCTYPE html>
<!-- This code fetches the details of the patient after the doctor has submitted and displays them in a table -->
<html>
  <style>
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      background-color: #96D4D6;
      border-style: solid;
    }
  </style>
<body>
  <h1>DISPLAY OF THE INSERTED DATA</h1>

  <?php
  session_start();
  require_once("dbconnection.php");

  // Posts items in the database 

  $PatientSSN = isset($_POST["ssn"]) ? $_POST["ssn"] : "";
  $FirstName = isset($_POST["fname"]) ? $_POST["fname"] : "";
  $LastName = isset($_POST["lname"]) ? $_POST["lname"] : "";
  $PatientIllness = isset($_POST["illness"]) ? $_POST["illness"] : "";
  $PatientPrescription = isset($_POST["prescription"]) ? $_POST["prescription"] : "";
  $DrugsPrescribed = isset($_POST["drugp"]) ? $_POST["drugp"] : "";
  

  // Inserts the record into the database 

 // Inserts the record into the database 
$sql = "INSERT INTO doctorsummary (PatientSSN, FirstName, LastName, PatientIllness, PatientPrescription, DrugsPrescribed)
VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $PatientSSN, $FirstName, $LastName, $PatientIllness, $PatientPrescription, $DrugsPrescribed);

if ($stmt->execute()) {
echo "Record inserted successfully";
} else {
echo "Could not insert record: " . $stmt->error;
}


  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM doctorsummary WHERE PatientSSN = ? AND FirstName = ? AND LastName = ? AND PatientIllness = ?  AND PatientPrescription = ? AND DrugsPrescribed = ? ");
  $stmt->bind_param("ssssss", $PatientSSN, $FirstName, $LastName, $PatientIllness, $PatientPrescription, $DrugsPrescribed);
  
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
                  <th>Patient Illness</th>
                  <th style="width:400%">Patients Prescription</th>
                  <th>Drug Prescribed</th>
              </tr>';

          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>".$row['PatientSSN']."</td>
                      <td>".$row['FirstName']."</td>
                      <td>".$row['LastName']."</td>
                      <td>".$row['PatientIllness']."</td>
                      <td>".$row['PatientPrescription']."</td>
                      <td>".$row['DrugsPrescribed']."</td>
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
