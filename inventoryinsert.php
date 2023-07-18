<!DOCTYPE html>
<!-- This code fetches the details of the durgs  present in the database -->
<html>
  <head> <title>Inventory insert </title>
      </head>
  <style>
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      background-color: #96D4D6;
      border-style: solid;
    }
  </style>
<body>
  <h1>DISPLAY OF THE INSERTED MEDICINE </h1>


  <?php
  session_start();
  require_once("dbconnection.php");

  // Posts items in the database 
  $DrugName = isset($_POST["dname"]) ? $_POST["dname"] : "";
  $DrugSSN= isset($_POST["dssn"]) ? $_POST["dssn"] : "";
  $Quantity = isset($_POST["quan"]) ? $_POST["quan"] : "";
  $PharmaceuticalCompany = isset($_POST["Pharm"]) ? $_POST["Pharm"] : "";
  $Price = isset($_POST["price"]) ? $_POST["price"] : "";

  // Inserts the record into the database 
  $sql = "INSERT INTO inventory(DrugName, DrugSSN,Quantity,PharmaceuticalCompany,Price)
  VALUES (?, ?, ?, ?,?)";

  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit;
  }

  $stmt->bind_param("sssss",$DrugName,$DrugSSN, $Quantity,$PharmaceuticalCompany,$Price);

  if ($stmt->execute()) {
    echo "Record inserted successfully";
  } else {
    echo "Could not insert record: " . $stmt->error;
    exit;
  }

  // Prepare the SQL statement
  $sql = "SELECT * FROM inventory WHERE DrugName = ? AND DrugSSN = ? AND Quantity = ? AND PharmaceuticalCompany=?  AND Price =? " ;
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    echo " Error preparing statement: " . $conn->error;
    exit;
  }

  $stmt->bind_param("sssss", $DrugName,$DrugSSN, $Quantity,$PharmaceuticalCompany,$Price);

  // Execute the prepared statement
  if ($stmt->execute()) {
    // Get the result
    $result = $stmt->get_result();


    

    if ($result) {
      if ($result->num_rows > 0) {
        // Generate the table
        echo '<table>
              <tr>
                <th>Drug Name</th>
                <th>Drug SSN </th>
                <th>Quantity</th>
                <th>PharmaceuticalCompany</th>
                <th>Price</th>
        
              </tr>';

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>".$row['DrugName']."</td>
                  <td>".$row['DrugSSN']."</td>
                  <td>".$row['Quantity']."</td>
                  <td>".$row['PharmaceuticalCompany']."</td>
                  <td>".$row['Price']."</td>
    
                </tr>";
        }

        echo '</table>';
      } else {
        echo "No records found.";
      }
    } else {
      echo "Error retrieving records: " . $stmt->error;
    }
  } else {
    echo "Error executing statement: " . $stmt->error;
  }

  // Close the prepared statement and database connection
  $stmt->close();
  $conn->close();
  ?><br><br>
 
 <form action="inventorydisplay.php" method="post">
 <input type="submit" value="Display of all drugs" ><br>
</form>
</body>
</html>
