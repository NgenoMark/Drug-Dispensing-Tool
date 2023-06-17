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

<form action="doctorsummary.php" method="POST">
  <fieldset>

    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h1>Welcome, $username</h1>";
    }
    ?>

    <legend>DOCTORS SUMMARY:</legend>

    <label for="ssn">Patient SSN:</label><br>
    <input type="text" id="ssn" name="ssn" required autofocus autocomplete="off"><br>

    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" required autofocus autocomplete="off" ><br>

    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" required autofocus autocomplete="off"><br>

    <label for="Illness">Patient Illness(s):</label><br>
    <textarea name="message" rows="5" cols="30"  required ></textarea><br>
    

    <label for="Prescription">Patient Prescription:</label><br>
    <textarea name="message" rows="10" cols="30" required ></textarea><br>


    <label for="drugp">Drug(s) prescribed and their dosages:</label><br>
    <textarea name="message" rows="10" cols="30" required ></textarea><br><br>


    <input type="submit" value="Save in system">
  </fieldset>
</form>

</body>
</html>
