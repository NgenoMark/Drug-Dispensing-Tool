<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="drug_dispensing_tool";


// Create connection
$conn= mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: ".mysqli_connect_error);
}
echo "Connected successfully";



/*// sql to delete a record
$sql = "DELETE FROM patients WHERE Age=0";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}*/

?>