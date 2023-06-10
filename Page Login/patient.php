<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        table thead {
            background-color: #f2f2f2;
        }
        
        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }
        
        table th {
            font-weight: bold;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drugdispensingtool";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Connection failed";
}

$sql = "SELECT * FROM patient";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>SSN</th>
                    <th>First Name</th>
                    <th>Second Name</th>
                    <th>Address</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>";
            
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["SSN"] . "</td>
                <td>" . $row["First_name"] . "</td>
                <td>" . $row["Second_name"] . "</td>
                <td>" . $row["Address"] . "</td>
                <td>" . $row["Age"] . "</td>
            </tr>";
    }
    
    echo "</tbody>
        </table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
    
</body>
</html>
x