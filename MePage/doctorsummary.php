<!DOCTYPE html>
<!-- This is the front page where the doctor inserts analysis of patient -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>

        body {
          /* <!--background-image:url("images/surgery.png") ;--> */
            background-size: cover;
            background-color : black ;
        }

        legend{
            color : white ;
            font-family : Helvetica , Arial , sans-serif ;
        }
        h1{
            color : white ;
            font-family : Helvetica , Arial , sans-serif ;
        }

        #doctorName {
            position: absolute;
            top: 10px;
            right: 10px;
            color: blue;
            font-size: 18px;
        }

        .form-column {
            width: 50%;
            float: left;
        }

        .form-column:first-child {
            margin-right: 20px;
        }

        .form-row {
            margin-bottom: 10px;
            text-align : center;
        }

        .form-save{
            text-align : center ;
        }

        .form-button{
            border: none;
            background: green;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;

        }

        .form-label {
            font-size: 18px;
            color: white;
        }

        .form-button {
            display: block;
            width: 200px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

<form action="displaysummary.php" method="POST">
    <fieldset>
        <legend>DOCTORS SUMMARY:</legend>

        <?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h1>Welcome, $username</h1>";
        }
        ?>

        <div class="form-column">
            <div class="form-row">
                <label for="ssn" class="form-label">Patient SSN:</label><br>
                <input type="text" id="ssn" name="ssn" required autofocus autocomplete="off"><br>
            </div>

            <div class="form-row">
                <label for="fname" class="form-label">First name:</label><br>
                <input type="text" id="fname" name="fname" required autofocus autocomplete="off"><br>
            </div>

            <div class="form-row">
                <label for="lname" class="form-label">Last name:</label><br>
                <input type="text" id="lname" name="lname" required autofocus autocomplete="off"><br>
            </div>

        
        </div>

        <div class="form-column">
             <!-- <div class="form-row">
                <label for="prescription" class="form-label">Patient Prescription:</label><br>
                <textarea name="prescription" rows="10" cols="30" required></textarea><br>
            </div>
              -->

              <div class="form-row">
                <label for="illness" class="form-label">Patient Illness(s):</label><br>
                <textarea name="illness" rows="5" cols="30" required></textarea><br>
            </div>

            <div class="form-row">
                <label for="drugp" class="form-label">Drug(s) prescribed and their dosages:</label><br>
                <textarea name="drugp" rows="10" cols="30" required></textarea><br><br>
            </div>
        </div>

        <div class="form-save">
            <button type = "submit" class = "form-button"> Submit  </button>
        </div>

    

    </fieldset>
</form>
</body>
</html>
