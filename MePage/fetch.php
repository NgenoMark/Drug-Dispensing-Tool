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
<h2>DISPLAY OF ALL PATIENTS DETAILS IN THE DATABASE</h2>

<?php
require_once('dbconnection.php');

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
            </tr>";
    }

    echo '</table>';
} else {
    echo "No records found.";
}
?>
</body>
</html>
