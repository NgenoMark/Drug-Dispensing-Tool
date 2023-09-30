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

.dname{
    margin-left:150px
}

.view{
    margin-left:100px;
}

.img{
    margin-right:220px;
}

</style>

<?php
include("header.php");
?>

<header>
    <h3>Neta Pharmacy</h3>
    <ul>

        <li> <a href="drugdisplay.php?category=Analgesics">Analgesics</a></li>
        <li> <a href="drugdisplay.php?category=Antibiotics">Antibiotics</a> </li>
        <li> <a href="drugdisplay.php?category=Antivirals">Antivirals</a> </li>
        <li> <a href="drugdisplay.php?category=Antifungals">Antifungals</a> </li>
        <li> <a href="drugdisplay.php?category=Antidepressants">Antidepressants</a> </li>
        <li> <a href="drugdisplay.php?category=Antihistamines">Antihistamines</a> </li>
    </ul>
</header>

<?php
$selectedCategory = $_GET['category'] ?? null;

$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

$dbconn = mysqli_connect($servername, $username, $password, $database);
$table = "inventory";

$result = mysqli_query($dbconn, "SELECT * FROM $table WHERE Category = '$selectedCategory' ");



if ($result) {
    echo "<table>"; // Start a table
    $drugsInRow = 0; // Initialize drugs in the current row count
    while ($data = mysqli_fetch_assoc($result)) {
        if ($drugsInRow % 2 === 0) {
            // Start a new row for every two drugs
            echo "<tr>";
        }

        echo "<td class='img-container'>"; // Apply the class to the table cell
        echo "<h2 class = 'dname' >{$data['DrugName']}</h2>";
        echo "<img class = 'img' src='{$data['ImagePath']}'>";
        echo "<h2 class = 'view' ><a href='drugdetails.php?id={$data['DrugName']}'>View Details</a></h2>";
        echo "</td>";

        $drugsInRow++;

        if ($drugsInRow % 2 === 0) {
            // Close the row after displaying two drugs
            echo "</tr>";
        }
    }

    // Close the last row if it's not complete
    if ($drugsInRow % 2 !== 0) {
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
