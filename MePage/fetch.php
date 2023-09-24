<!DOCTYPE html>
<!-- This code fetches patient data from the database and displays it in a table -->
<html>
<head>
    <style>
        body {
            background-color: #2C3333;
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

        h2 {
            color: white;
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

<form method="POST">
    <label for="search_name">Search by First Name:</label>
    <input type="text" name="search_name" id="search_name" value="<?php echo isset($search_name) ? $search_name : ''; ?>">
    <button type="submit">Search</button>
</form>

<?php
require_once('dbconnection.php');

// Check if the delete form is submitted
if (isset($_POST['delete'])) {
    $PatientSSNToDelete = $_POST['delete_ssn'];

    // Prepare the SQL statement to delete the record
    $deleteStmt = $conn->prepare("DELETE FROM doctorsummary WHERE PatientSSN = ?");
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
$search_name = isset($_POST['search_name']) ? $_POST['search_name'] : ''; // Get the search name if submitted

// Construct the SQL query based on the search name
$sql = "SELECT COUNT(*) AS total FROM doctorsummary";
if (!empty($search_name)) {
    $sql .= " WHERE FirstName LIKE '%$search_name%'";
}

$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row['total'] / $results_per_page);

// Check if the current page is set, otherwise set it to 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the starting and ending record indices for the current page
$start_index = ($current_page - 1) * $results_per_page;
$end_index = $start_index + $results_per_page - 1;

// Construct the SQL query with pagination and search name
$sql = "SELECT * FROM doctorsummary";
if (!empty($search_name)) {
    $sql .= " WHERE FirstName LIKE '%$search_name%'";
}
$sql .= " LIMIT $start_index, $results_per_page";
$results = $conn->query($sql);

if ($results && $results->num_rows > 0) {
    echo '<table>
        <tr>
            <th>Patient SSN</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Patient Illness</th>
            <th>Drug Prescribed</th>
            <th>Action</th>
        </tr>';

    while ($row = $results->fetch_assoc()) {
        echo "<tr>
            <td>".$row['PatientSSN']."</td>
            <td>".$row['FirstName']."</td>
            <td>".$row['LastName']."</td>
            <td>".$row['Patientillness']."</td>
            <td>".$row['DrugsPrescribed']."</td>
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

<?php
    // Display pagination links
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
$conn->close();
?>

</body>
</html>
