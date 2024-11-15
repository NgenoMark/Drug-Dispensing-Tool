<?php
include("dbconnection.php");

// Fetch all data from the users table excluding the password field
$query = "SELECT ID, username, email, dob, phone FROM users";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>User List</h2>";
    echo "<table class='user-table'>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Age</th><th>Phone Number</th></tr>";

    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['email']."</td>";

        // Calculate age based on date of birth
        $dateOfBirth = new DateTime($row['dob']);
        $today = new DateTime();
        $age = $today->diff($dateOfBirth)->y;

        echo "<td>".$age."</td>";
        echo "<td>".$row['phone']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($conn);
?>

<style>
    .user-table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table th, .user-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .user-table th {
        background-color: #f2f2f2;
    }

    .user-table tr:hover {
        background-color: #f5f5f5;
    }

    .user-table h2 {
        margin-bottom: 10px;
    }
</style>
