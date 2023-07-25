<?php
include("dbconnection.php");

// Fetch all records from the drug_dispense table
$query = "SELECT * FROM dispensing_history";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Drug Dispense History</h2>";
    echo "<table>";
    echo "<tr><th>Patient Name</th><th>Drug</th><th>Price</th><th>Quantity</th></tr>";

    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['PatientName']."</td>";
        echo "<td>".$row['Drug']."</td>";
        echo "<td>".$row['Price']."</td>";
        echo "<td>".$row['Quantity']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No drug dispense history found.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drug Dispense History</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Your PHP code to retrieve and display the drug dispense history table here
    ?>

</body>
</html>

