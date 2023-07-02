<?php
session_start();
include("dbconnection.php");

// Retrieve the submitted SSN
if (isset($_POST['SSN'])) {
    $ssn = $_POST['SSN'];

    // Prepare and execute the query to retrieve patient details
    $stmt = $conn->prepare('SELECT * FROM doctorsummary WHERE PatientSSN = ?');
    $stmt->bind_param('s', $ssn);
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch the results as an associative array
    $patientDetails = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>

        body{
            background-color : #8E7C68; 
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        button{
            border: none;
            background: green;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            }


            button:hover{
                cursor: pointer;
                background-color : red ;
            }
    </style>
</head>
<body>
    <?php if (isset($patientDetails)): ?>
        <?php if ($patientDetails): ?>
            <h2>Patient Details:</h2>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Illness</th>
                    <th>Prescription</th>
                    <th>Drugs Prescribed</th>
                </tr>
                <tr>
                    <td><?php echo $patientDetails['FirstName']; ?></td>
                    <td><?php echo $patientDetails['LastName']; ?></td>
                    <td><?php echo $patientDetails['PatientIllness']; ?></td>
                    <td><?php echo $patientDetails['PatientPrescription']; ?></td>
                    <td><?php echo $patientDetails['DrugsPrescribed']; ?></td>
                </tr>
            </table> <br> <br>
        <?php else: ?>
            <p>No patient found with the provided SSN.</p>
        <?php endif; ?>
    <?php endif; ?>

    <button onclick = "redirectToSSNPage()" type = "button"> Back to SSN search
    </button>

    <script>
        function redirectToSSNPage(){
            window.location.href = "patientdashboard.php"; 
        }
    </script>

   
</body>
</html>
