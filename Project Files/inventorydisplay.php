<!DOCTYPE html>
<!-- This code takes inventory details from the database and displays it -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delete data from the database using PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Add your CSS styling here -->
    <style>
        body {
            background-color: black;
            color: white;
        }

        table {
            border: 1px solid white;
             border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid white;
            border: 1px solid white;
             border-collapse: collapse;
        }

        th {
            background-color: #354649;
        }

        .button{
            border:none;
            background: green;
            padding: 6px 15px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            }

        .button:hover{
                cursor: pointer;
                background-color : darkred ;
            }

            .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    color: black;
    float: none;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
}



    </style>
</head>
<body>
    <h1>Medicine Inventory</h1>

    <?php
    require_once('dbconnection.php'); // Make sure this line includes the correct file name

    if (isset($_GET['DrugSSN'])) {
        $DrugSSN = $_GET['DrugSSN'];
        $delete = mysqli_query($conn, "DELETE FROM `inventory` WHERE DrugSSN='$DrugSSN'"); // Use $conn instead of $connection
    }

    $select = "SELECT * FROM inventory";
    $query = mysqli_query($conn, $select); // Use $conn instead of $connection

    $num = mysqli_num_rows($query);

    if ($num > 0) {
        echo '<table>
            <tr>
            <th> Drug Category</th>
            <th>Drug Name</th>
            <th>Drug SSN </th>
            <th>Quantity</th>
            <th width=40% height=30%>Details</th>
            <th>PharmaceuticalCompany</th>
            <th>Price</th>
            <th>Image Path</th>
    
                <th width=20%>Action</th>
            </tr>';

        while ($result = mysqli_fetch_assoc($query)) {
            echo "<tr>
                   <td>".$result['Category']."</td>
                    <td>".$result['DrugName']."</td>
                    <td>".$result['DrugSSN']."</td>
                    <td>".$result['Quantity']."</td>
                    <td>".$result['Details']."</td>
                    <td>".$result['PharmaceuticalCompany']."</td>
                    <td>".$result['Price']."</td>
                    <td>".$result['ImagePath']."</td>
                    <td>
                        <a href='inventorydisplay.php?DrugSSN=".$result['DrugSSN']."' class='button'>Delete</a>
                        <a href='inventoryupdate.php?DrugSSN=".$result['DrugSSN']."' class='button'>Update</a>
                    </td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "No records found.";
    }
    ?>

    <br>
    <div class='button'>
        <form action="newpatient.php" method="post">
            <input type="submit" value="Go back" formaction="newpatient.php">
        </form>
    </div>
</body>
</html>