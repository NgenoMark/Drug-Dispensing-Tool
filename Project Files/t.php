<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>
h3 {
    margin-left: 150px;
    color: white;
}

h2 {
    color: white;
}

.category {
    margin-left: 150px;
}

/* Add CSS for table and table cells */
table {
    width: 100%;
}

table, th, td {
    border: 1px solid black;
}

td {
    padding: 10px;
    text-align: center;
}

ul{
    display:flex;
    align-items:space-between;
}

ul li{
    padding :10px 10px ;
    text-decoration:none;
    margin-left:25px;
}

ul li a{
  color: white;
  text-decoration: none;
  font-weight: bold;
  }

body{
    background-color:black;
}
</style>

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

$result = mysqli_query($dbconn, "SELECT * FROM $table");

$currentCategory = null;
$drugsInRow = 0;

if ($result) {
    echo "<table>"; // Start a table
    while ($data = mysqli_fetch_assoc($result)) {
        if ($data['Category'] !== $currentCategory || $drugsInRow === 0) {
            if ($drugsInRow > 0) {
                // Close the previous row if it's not the first row
                echo "</tr>";
            }
            $currentCategory = $data['Category'];
            echo "<th><h2>{$currentCategory}</h2></th>"; // Display the category as a header cell

            echo "<tr>"; // Start a new row
            $drugsInRow = 0; // Reset the drugs in the current row count
        }

        echo "<td>";
        echo "<h2>{$data['DrugName']}</h2>";
        echo "<img src='{$data['ImagePath']}'>";
        echo "<a href='drugdetails.php?id={$data['DrugName']}'>View Details</a>";
        echo "</td>";

        $drugsInRow++;

        // Start a new row every three drugs
        if ($drugsInRow === 2) {
            echo "</tr>";
            $drugsInRow = 0;
        }
    }

    // Close the last row if it's not empty
    if ($drugsInRow > 0) {
        echo "</tr>";
    }

    echo "</table>"; // Close the table
}
?>

<?php
include("footer.php");
?>
</body>
</html>