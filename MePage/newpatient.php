
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login </title>

        <style>
    h1 {
      position: absolute;
      top: 10px;
      right: 10px;
    }
  </style>
    </head>
<body>
<form action="patients.php" method="POST">
  <fieldset>

  <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1>Welcome, $username</h1>";
    }
    ?>


    <legend> NEW PATIENTS REGISTRATION FORM :</legend>

    <label for="ssn">Patient SSN:</label><br>
    <input type="text" id="ssn" name="ssn" ><br>

    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" ><br>

    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>

    <label for="address">Patient Address:</label><br>
    <input type="text" id="address" name="address"><br>
    
    <label for="age">Patient Age:</label><br>
    <input type="number" id="age" name="age" required><br>

    <label for="Prescription">Patient Prescription:</label><br>
    <textarea name="pres" rows="5" cols="30"></textarea><br>
    

    <label for="drugp">Drug(s) prescribed and their dosages:</label><br>
    <textarea name="drugp" rows="5" cols="30"></textarea><br><br>

    <label for="drug">Drug SSN</label><br>
    <input type="text" id="drug" name="drug"><br><br>


    <input type="submit" formaction="patients.php" value="Save new patient details"><br><br>
    <input type="submit" formaction="fetch.php" value="To display all patients present in the system"><br><br>
    <input type="submit"   formaction="inventory.html" value="Check the inventory"><br><br>
    <input type="submit" formaction="payment.html" value="Proceed to payment"><br><br>
    <input type="reset">


  </fieldset>
</form>

</body>
</html>

