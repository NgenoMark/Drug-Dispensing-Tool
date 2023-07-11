<!DOCTYPE html>
<!-- This code fetches patient data from database and displays it in table-->
<html>
<head>
    <style>

        body{
            background-color : #2C3333; 
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
            background-color: #96D4D6;
        }

        th {
            background-color: #f2f2f2;
        }

        h2{
            color : white ;
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
    <h2>DISPLAY OF ALL PATIENTS DETAILS IN THE DATABASE</h2>

    <?php
    require_once('dbconnection.php');

    // Check if the delete form is submitted
    if (isset($_POST['delete'])) {
        $PatientSSNToDelete = $_POST['delete_ssn'];

        // Prepare the SQL statement to delete the record
        $deleteStmt = $conn->prepare("DELETE FROM patients WHERE PatientSSN = ?");
        $deleteStmt->bind_param("s", $PatientSSNToDelete);

        // Execute the delete statement
        if ($deleteStmt->execute()) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $deleteStmt->error;
        }

        // Close the delete statement
        $deleteStmt->close();
    }

    $results_per_page = 13; // Number of results per page
    $sql = "SELECT COUNT(*) AS total FROM patients";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_pages = ceil($row['total'] / $results_per_page);

    // Check if the current page is set, otherwise set it to 1
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the starting and ending record indices for the current page
    $start_index = ($current_page - 1) * $results_per_page;
    $end_index = $start_index + $results_per_page - 1;

    $sql = "SELECT * FROM patients LIMIT $start_index, $results_per_page";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        echo '<table>
            <tr>
                <th>Patient SSN</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Patient Address</th>
                <th>Patient Age</th>
                <th>Patient Prescription</th>
                <th>Drug Prescribed</th>
                <th>Drug SSN</th>
                <th>Action</th>
            </tr>';

        while ($row = $results->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['PatientSSN']."</td>
                    <td>".$row['firstname']."</td>
                    <td>".$row['lastname']."</td>
                    <td>".$row['Address']."</td>
                    <td>".$row['Age']."</td>
                    <td>".$row['PatientPrescription']."</td>
                    <td>".$row['DrugPrescribed']."</td>
                    <td>".$row['DrugSSN']."</td>
                    <td>
                        <a href='edit.php?ssn=".$row['PatientSSN']."'>Edit</a> |
                        <a href='delete.php?ssn=".$row['PatientSSN']."'>Delete</a>
                    </td>
                </tr>";
        }

        echo '</table>';
        ?>

        <form method="POST">
        <label for="delete_ssn">Enter Patient SSN to delete:</label>
        <input type="text" name="delete_ssn" id="delete_ssn">
        <button type="submit" name="delete">Delete</button>
    </form>

    <?php    // Display pagination links
        echo '<div class="pagination">';
        for ($page = 1; $page <= $total_pages; $page++) {
            echo '<a href="?page='.$page.'"';
            if ($page == $current_page) {
                echo ' class="active"';
            }
            echo '>'.$page.'</a>';
        }
        echo '</div>';
    } else {
        echo "No records found.";
    }
    ?>

</body>
</html>
