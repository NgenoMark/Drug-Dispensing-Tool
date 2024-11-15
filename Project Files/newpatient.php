<!DOCTYPE html>
<!-- This allows the pharmacist on login to register a new patient . They can also look at available patients
          ,check the inveentory and also confirm payment for patient -->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>

        <style>
            body {
                background-color: black;
            }


.logo {
  color: white;
  top : 30px;
  left : 30px;
  font-size: 40px;
}

nav {
  display: flex;
  align-items: left ;
  justify-content: space-between;
  padding-top: 20px;
  padding-left: 10%;
  padding-right: 10%;
  background-color : #354649;
  margin : 0 ;
}


h1 {
                position: absolute;
                top: 50px;
                right: 40px;
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

            .button{
            border: none;
            background: green;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            }

        

            .form-head{
                color : white;
            }

            .button:hover{
                cursor: pointer;
                background-color : red ;
            }

            .functions{
                display : flex ;
                justify-content : space-between ;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

    <div class="topnav">
  <nav>
    <h2 class="logo">Neta Pharmacy</h2>
  </nav>
</div>
        <form action="patients.php" method="POST">
            <fieldset>

                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<h1>Welcome, $username</h1>";
                }
                ?>

                <legend class = "form-head">NEW PATIENTS REGISTRATION FORM:</legend>

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
                            <label for="dob" class="form-label">Date of Birth:</label><br>
                            <input type="date" id="dob" name="dob" required><br>
                        </div>

                    </div>

                    <div class="form-column">
                        <div class="form-row">
                            <label for="illness" class="form-label">Patient illness:</label><br>
                            <textarea name="illness" rows="5" cols="30"></textarea><br>
                        </div>

                        <div class="form-row">
                            <label for="drugp" class="form-label">Drug(s) prescribed and their dosages:</label><br>
                            <textarea name="drugp" rows="5" cols="30"></textarea><br>
                        </div>

                        <!-- <div class="form-row">
                            <label for="drug" class="form-label">Drug SSN:</label><br>
                            <input type="text" id="drug" name="drug"><br><br>
                        </div> -->
                    </div>
                </div>

                <div class="form-buttons">
                    <button class = "button" type = "submit"> Submit </button>
                    <button class = "button" type = "reset" > Reset </button>
                </div>

                
            </fieldset>
        </form> <br> <br>

        <div class = "functions">
        <button class = "button" onclick="redirectToPatientsPage()">Display Patients</button><br><br>
        <script>
                function redirectToPatientsPage() {
                window.location.href = "fetch.php"; // Replace with your desired URL
                    }
        </script>
        <button class = "button" onclick = "redirectToInventory()"> Check Inventory </button> <br> <br>
        <script>
            function redirectToInventory(){
                window.location.href = "inventoryfront.php" ;
            }
        </script>
        <button class="button" onclick="redirectToPayment()">Payment</button>
        <script>
            function redirectToPayment() {
                 window.open("https://www.paypal.com/signin", "_blank");
            }
        </script>
        <button class = "button" onclick = "redirectToDispense()"> Dispense Drugs</button>
        <script>
            function redirectToDispense(){
            window.location.href = ("dispense.php");}
        </script>
            <button class = "button"  onclick="redirectToHistory()"> View History of Dispensing</button>
            <script>function redirectToHistory()
{
    window.location.href=("historyfetch.php")
}    </script><br>

        <button style="background-color:red;"class = "button" onclick = "redirectToLogout()"> Logout</button>
        <script>
            function redirectToLogout(){
            window.location.href = ("logoutpage.html");}
        </script>


        </div>

    </body>
</html>
