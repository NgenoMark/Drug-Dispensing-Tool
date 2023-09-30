<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Details</title>
</head>
<body>

<?php

include("header.php");

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

$dbconn = mysqli_connect($servername, $username, $password, $database);
$table = "inventory";

if (isset($_GET['id'])) {
    $drugName = mysqli_real_escape_string($dbconn, $_GET['id']);
    $query = "SELECT * FROM $table WHERE DrugName = '$drugName'";
    $result = mysqli_query($dbconn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        echo "<h1>Drug Details</h1>";
        echo "<h4>Drug Name: {$data['DrugName']}</h4>";
        echo "<h4>Category: {$data['Category']}</h4>";
        echo "<h4>Drug SSN: {$data['DrugSSN']}</h4>";
        echo "<h4>Quantity: {$data['Quantity']}</h4>";
        echo "<h4>Details: {$data['Details']}</h4>";
        echo "<h4>Pharmaceutical Company: {$data['PharmaceuticalCompany']}</h4>";
        echo "<h4>Price: {$data['Price']}</h4>";
        echo "<img src='{$data['ImagePath']}' alt='Drug Image'>";
        // Display other drug details as needed
    } else {
        echo "<p>Drug not found.</p>";
    }
} else {
    echo "<p>Invalid request. Please select a drug to view details.</p>";
}

mysqli_close($dbconn);
?>

</body>
</html>
