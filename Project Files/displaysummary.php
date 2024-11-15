<!DOCTYPE html>
<!-- This code fetches the details of the patient after the doctor has submitted and displays them in a table -->
<html>
<style>
  body {
    background-color: #A1CCD1;
  }

  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    background-color: #96D4D6;
    text-align: left;
  }

  button {
            border: none;
            background: red;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            margin: 20px;
        }

button:hover {
            background-color: green;
            transition: scale(1.3);
            cursor: pointer;
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
  /* $PatientPrescription = isset($_POST["prescription"]) ? $_POST["prescription"] : ""; */
  $DrugsPrescribed = isset($_POST["drugp"]) ? $_POST["drugp"] : "";
  

  // Inserts the record into the database 

 // Inserts the record into the database 
$sql = "INSERT INTO doctorsummary (PatientSSN, FirstName, LastName, PatientIllness,DrugsPrescribed)
VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $PatientSSN, $FirstName, $LastName, $PatientIllness , $DrugsPrescribed);

if ($stmt->execute()) {
echo "Record inserted successfully";
} else {
echo "Could not insert record: " . $stmt->error;
}


  // Prepare the SQL statement
  $stmt = $conn->prepare("SELECT * FROM doctorsummary WHERE PatientSSN = ? AND FirstName = ? AND LastName = ? AND PatientIllness = ? AND DrugsPrescribed = ? ");
  $stmt->bind_param("sssss", $PatientSSN, $FirstName, $LastName, $PatientIllness, $DrugsPrescribed);
  
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
                  <th>Drug Prescribed</th>
              </tr>';

          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>".$row['PatientSSN']."</td>
                      <td>".$row['FirstName']."</td>
                      <td>".$row['LastName']."</td>
                      <td>".$row['Patientillness']."</td>
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

  <button onclick = "redirectToAllPatients()"> View all patients </button>
  <script>
    function redirectToAllPatients(){
      window.location.href = 'fetch.php';
    }
  </script>
</body>
</html>
