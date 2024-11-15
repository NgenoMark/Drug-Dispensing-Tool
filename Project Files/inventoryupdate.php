<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Inventory</title>
    <link rel="stylesheet" href="stylef.css">
</head>
<body>
   
    <?php
    require_once('dbconnection.php');

    if (isset($_POST['submit'])) {
        // Retrieve the form data

        $DrugSSN = $_POST['dssn'];
        $Category = $_POST['cat']; 
        $DrugName = $_POST['dname'];
        $Quantity = $_POST['quan'];
        $Details = $_POST['des'];
        $PharmaceuticalCompany = $_POST['Pharm'];
        $Project= $_POST['price'];
        $ImagePath = $_POST['image'];


        // Update the record in the database
        $sql = "UPDATE inventory SET 
        Category=?,
        DrugName = ?,
        Quantity = ?,
        Details=?,
        PharmaceuticalCompany = ?,
        Price = ?,
        ImagePath=?
    WHERE DrugSSN = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $Category, $DrugName, $Quantity ,$Details, $PharmaceuticalCompany, $Project ,$ImagePath, $DrugSSN);


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
            ?><div class= container>
            <form method="POST" action="">
                 <h1>Edit Medicine Details</h1>
                <input type="hidden" name="dssn" value="<?php echo $row['DrugSSN']; ?>">

                <label for="cat">Category</label>
                <select id="cat" name="cat">
                <option value="Analgesics">Analgesics</option>
                <option value="Antibiotics">Antibiotics</option>
                <option value="Antivirals">Antivirals</option>
                <option value="Antifungals">Antifungals</option>
                <option value="Antidepressants">Antidepressants</option>
                <option value="Antihistamines">Antihistamines</option>
                </select><br><br>

                <label for="dname">Drug Name:</label>
                <input type="text" name="dname" value="<?php echo $row['DrugName']; ?>"><br><br>

                <label for="quan">Quantity:</label>
                <input type="text" name="quan" value="<?php echo $row['Quantity']; ?>"><br><br>

                <label for="des" class="form-label">Details:</label><br>
                <textarea name="des" rows="5" cols="30" required  class="data_insert">
Drug Classification:
Indications:
Side effects:
Active ingredient:
                </textarea><br><br>

                <label for="Pharm">Pharmaceutical Company:</label>
                <input type="text" name="Pharm" value="<?php echo $row['PharmaceuticalCompany']; ?>"><br><br>

                <label for="price">Price:</label>
                <input type="text" name="price" value="<?php echo $row['Price']; ?>"><br><br>

                <label for="image">ImagePath:</label><br>
                <input type="file" id="image" name="image" accept="image/*" class="data_insert"><br><br>
       


                <input type="submit" name="submit" value="Update">
                <input type="submit" name="submit" value="Back to Inventory">
             

            </form>
        </div>
            <?php
        }
        $stmt->close();
    } else {
        echo "Invalid request.";
    }
    ?>
    <br>
   
</body>
</html>