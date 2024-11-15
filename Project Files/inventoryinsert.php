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
  $Category=isset($_POST["cat"]) ? $_POST["cat"] : "";
  $DrugName = isset($_POST["dname"]) ? $_POST["dname"] : "";
  $DrugSSN= isset($_POST["dssn"]) ? $_POST["dssn"] : "";
  $Quantity = isset($_POST["quan"]) ? $_POST["quan"] : "";
  $Details = isset($_POST["des"]) ? $_POST["des"] : "";
  $PharmaceuticalCompany = isset($_POST["Pharm"]) ? $_POST["Pharm"] : "";
  $Price = isset($_POST["price"]) ? $_POST["price"] : "";


  // File upload handling
  $target_dir = "images/"; // Create an "images" directory in your project folder
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
  } else {
      echo "Sorry, there was an error uploading your file.";
  }

  // Inserts the record into the database 
  $ImagePath = $target_file;
  $sql = "INSERT INTO inventory(Category,DrugName, DrugSSN,Quantity,Details,PharmaceuticalCompany,Price,ImagePath)
  VALUES (?, ?, ?, ?,?,?,?,?)";

  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit;
  }

  $stmt->bind_param("ssssssss", $Category,$DrugName,$DrugSSN, $Quantity,$Details,$PharmaceuticalCompany,$Price,$ImagePath);

  if ($stmt->execute()) {
    echo "Record inserted successfully";
  } else {
    echo "Could not insert record: " . $stmt->error;
    exit;
  }

  // Prepare the SQL statement
  $sql = "SELECT * FROM inventory WHERE  Category = ? AND  DrugName = ? AND DrugSSN = ? AND Quantity = ? AND Details = ? AND PharmaceuticalCompany = ?  AND Price = ? AND  ImagePath = ? " ;
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    echo " Error preparing statement: " . $conn->error;
    exit;
  }

  $stmt->bind_param("ssssssss", $Category,$DrugName,$DrugSSN, $Quantity,$Details,$PharmaceuticalCompany,$Price,$ImagePath);

  // Execute the prepared statement
  if ($stmt->execute()) {
    // Get the result
    $result = $stmt->get_result();




    if ($result) {
      if ($result->num_rows > 0) {
        // Generate the table
        echo '<table>
              <tr>
              <th> Drug Category</th>
                <th>Drug Name</th>
                <th>Drug SSN </th>
                <th>Quantity</th>
                <th width=40% height=40%>Details</th>
                <th PharmaceuticalCompany</th>
                <th>Price</th>
                <th>Image Path</th>
        
              </tr>';

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                 <td>".$row['Category']."</td>
                  <td>".$row['DrugName']."</td>
                  <td>".$row['DrugSSN']."</td>
                  <td>".$row['Quantity']."</td>
                  <td>".$row['Details']."</td>
                  <td>".$row['PharmaceuticalCompany']."</td>
                  <td>".$row['Price']."</td>
                  <td>".$row['ImagePath']."</td>
    
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