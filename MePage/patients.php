<!DOCTYPE html>
<!-- After the pharmacist clicks submit button the new patient is registered to database and the entered details are
         taken to database . You can also view all other patients-->
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
    <h1>DISPLAY OF THE INSERTED DATA</h1>

    <button onclick="redirectToPage()">View all patients</button>

    <script>
        function redirectToPage() {
            window.location.href = "fetch.php";
        }
    </script>

    <?php
    require_once("dbconnection.php");

    // Posts items in the database
    $PatientSSN = $_POST["ssn"];
    $FirstName = $_POST["fname"];
    $LastName = $_POST["lname"];
    $PatientAddress = $_POST["address"];
    $DateOfBirth = $_POST["dob"];
    $Patientillness = isset($_POST["illness"]) ? $_POST["illness"] : ""; 
    $DrugsPrescribed = isset($_POST["drugp"]) ? $_POST["drugp"] : "";
    /*$DrugSSN = $_POST["drug"]; */

    // Calculate age based on date of birth
    $today = new DateTime();
    $birthDate = new DateTime($DateOfBirth);
    $PatientAge = $today->diff($birthDate)->y;

    // Inserts the record into the database
    $sql_patients = "INSERT INTO patients (`PatientSSN`, `FirstName`, `LastName`, `Address`, `Age`, `Patientillness`, `DrugsPrescribed`)
            VALUES ('$PatientSSN', '$FirstName', '$LastName', '$PatientAddress', '$PatientAge', '$Patientillness', '$DrugsPrescribed')";

    $sql_doctor = "INSERT INTO  doctorsummary (`PatientSSN`, `FirstName`, `LastName`, `Patientillness`, `DrugsPrescribed`)
            VALUES ('$PatientSSN', '$FirstName', '$LastName', '$Patientillness', '$DrugsPrescribed')";
   

    if (mysqli_query($conn, $sql_patients) && (mysqli_query($conn, $sql_doctor))) {
        echo "Record inserted successfully";
    } else {
        echo "Could not insert record: " . mysqli_error($conn);
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM patients WHERE PatientSSN = ? AND FirstName = ? AND LastName = ? AND Address = ? AND Patientillness = ? AND DrugsPrescribed= ? ");
    $stmt->bind_param("ssssss", $PatientSSN, $FirstName, $LastName, $PatientAddress, $Patientillness, $DrugsPrescribed);

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
                    <th>Age</th>
                    <th >Patients illness</th>
                    <th>Drug Prescribed</th>
                </tr>';

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['PatientSSN'] . "</td>
                        <td>" . $row['FirstName'] . "</td>
                        <td>" . $row['LastName'] . "</td>
                        <td>" . $row['Address'] . "</td>
                        <td>" . $row['Age'] . "</td>
                        <td>" . $row['Patientillness'] . "</td>
                        <td>" . $row['DrugsPrescribed'] . "</td>
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
