<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>

        <style>
            body {
                background-color: black;
            }

            h1 {
                position: absolute;
                top: 10px;
                right: 10px;
            }

            .form-container {
                display: flex;
                justify-content: space-between;
                color: white;
            }

            .form-column {
                width: 45%;
            }

            .form-row {
                margin-bottom: 10px;
            }

            .form-label {
                font-size: 18px;
            }

            .form-buttons {
                text-align: center;
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

                <legend>NEW PATIENTS REGISTRATION FORM:</legend>

                <div class="form-container">
                    <div class="form-column">
                        <div class="form-row">
                            <label for="ssn" class="form-label">Patient SSN:</label><br>
                            <input type="text" id="ssn" name="ssn"><br>
                        </div>

                        <div class="form-row">
                            <label for="fname" class="form-label">First name:</label><br>
                            <input type="text" id="fname" name="fname"><br>
                        </div>

                        <div class="form-row">
                            <label for="lname" class="form-label">Last name:</label><br>
                            <input type="text" id="lname" name="lname"><br>
                        </div>

                        <div class="form-row">
                            <label for="address" class="form-label">Patient Address:</label><br>
                            <input type="text" id="address" name="address"><br>
                        </div>

                        <div class="form-row">
                            <label for="age" class="form-label">Patient Age:</label><br>
                            <input type="number" id="age" name="age" required><br>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-row">
                            <label for="prescription" class="form-label">Patient Prescription:</label><br>
                            <textarea name="pres" rows="5" cols="30"></textarea><br>
                        </div>

                        <div class="form-row">
                            <label for="drugp" class="form-label">Drug(s) prescribed and their dosages:</label><br>
                            <textarea name="drugp" rows="5" cols="30"></textarea><br>
                        </div>

                        <div class="form-row">
                            <label for="drug" class="form-label">Drug SSN:</label><br>
                            <input type="text" id="drug" name="drug"><br><br>
                        </div>
                    </div>
                </div>

                <div class="form-buttons">
                    <input type="submit" formaction="patients.php" value="Save new patient details"><br><br>
                    <button onclick="redirectToPage()">Display Patients</button><br><br>
                    <input type="submit" formaction="fetch.php" value="Display all patients in the system"><br><br>
                    <input type="submit" formaction="inventory.html" value="Check the inventory"><br><br>
                    <input type="submit" formaction="payment.html" value="Proceed to payment"><br><br>
                    <input type="reset">
                </div>

                <script>
                    function redirectToPage() {
                        window.location.href = "fetch.php"; // Replace with your desired URL
                    }
                </script>
            </fieldset>
        </form>
    </body>
</html>
