<?php
include("dbconnection.php");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve and validate the form data
    $patientName = validate($_POST['PatientName']);
    $drugName = validate($_POST['Drug']);
    $price = validate($_POST['Price']);
    $quantity = validate($_POST['Quantity']);


    // Perform any additional validation or checks if needed

    // Insert the drug dispense record into the database
    $query = "INSERT INTO dispensing_history (PatientName, Drug, Price , Quantity) VALUES ('$patientName', '$drugName', '$price' , '$quantity')";
    if (mysqli_query($conn, $query)) {
        echo "Drug dispense record saved successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Function to validate form data
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drug Dispensing</title>
    <link rel="stylesheet" href="stylef.css">
</head>
<body>
   <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1>Drug Dispensing</h1>
        <div>
            <label for="PatientName">Patient Name:</label>
            <input type="text" name="PatientName" id="PatientName" required>
        </div>
        <div>
            <label for="Drug">Drug Name:</label>
            <input type="text" name="Drug" id="Drug" required>
        </div>
        <div>
            <label for=" Price">Price:</label>
            <input type="number" name="Price" id="Price" required>
        </div>
        <div>
            <label for="Quantity">Quantity:</label>
            <input type="number" name="Quantity" id="Quantity" required>
        </div>
        <div>
            <input type="submit" value="Dispense Drug">
        </div>
        </div>
    </form>
</body>
</html>
