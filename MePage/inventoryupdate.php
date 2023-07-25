<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Inventory</title>
    <!-- Add your CSS styling here -->
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Edit Medicine Details</h1>
    <?php
    require_once('dbconnection.php');

    if (isset($_POST['submit'])) {
        // Retrieve the form data
        $DrugSSN = $_POST['dssn'];
        $DrugName = $_POST['dname'];
        $Quantity = $_POST['quan'];
        $PharmaceuticalCompany = $_POST['Pharm'];
        $Project= $_POST['price'];

        // Update the record in the database
        $sql = "UPDATE inventory SET 
        DrugName = ?,
        Quantity = ?,
        PharmaceuticalCompany = ?,
        Price = ?
    WHERE DrugSSN = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $DrugName, $Quantity, $PharmaceuticalCompany, $Project, $DrugSSN);


        if ($stmt->execute()) {
            echo "Record updated successfully";
            // Redirect to the page displaying all drugs after successful update
            header("Location: inventorydisplay.php");
            exit();
        } else {
            echo "Error updating record: " . $stmt->error;
        }
        $stmt->close();
    }

    if (isset($_GET['DrugSSN'])) {
        $DrugSSN = $_GET['DrugSSN'];
        $select = "SELECT * FROM inventory WHERE DrugSSN = ?";
        $stmt = $conn->prepare($select);
        $stmt->bind_param("s", $DrugSSN);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!$row) {
            echo "Medicine not found.";
        } else {
            ?>
            <form method="POST" action="">
                <input type="hidden" name="dssn" value="<?php echo $row['DrugSSN']; ?>">

                <label for="dname">Drug Name:</label>
                <input type="text" name="dname" value="<?php echo $row['DrugName']; ?>"><br><br>

                <label for="quan">Quantity:</label>
                <input type="text" name="quan" value="<?php echo $row['Quantity']; ?>"><br><br>

                <label for="Pharm">Pharmaceutical Company:</label>
                <input type="text" name="Pharm" value="<?php echo $row['PharmaceuticalCompany']; ?>"><br><br>

                <label for="price">Price:</label>
                <input type="text" name="price" value="<?php echo $row['Price']; ?>"><br><br>

                <input type="submit" name="submit" value="Update">

            </form>
            <?php
        }
        $stmt->close();
    } else {
        echo "Invalid request.";
    }
    ?>
    <br>
    <a href="inventorydisplay.php">Back to Inventory</a>
</body>
</html>