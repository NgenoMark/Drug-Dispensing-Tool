<!DOCTYPE html>
<!-- Front page for a user to register -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New User Registration</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url(images/high.jpg);
            background-color: #000;
            background-size: cover;
            background-position: center top 10%;
        }

        .registration-box {
            position: absolute;
            top: 50%;
            left: 20%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0);
            border-radius: 10px;
        }

        .registration-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .registration-box label {
            color: #fff;
        }

        .registration-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background-color: transparent;
            color: #fff;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url('https://www.flaticon.com/free-icon/back-button_93634?related_id=93634');
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 12px 12px;
            padding-right: 20px;
        }

        .registration-box select::-ms-expand {
            display: none;
        }

        .registration-box select option {
            background-color: #000;
            color: #fff;
        }

        .registration-box input[type="text"],
        .registration-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background-color: transparent;
            color: #fff;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
        }

        .registration-box input[type="submit"],
        .registration-box input[type="reset"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #96D4D6;
            color: black;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .registration-box input[type="submit"]:hover,
        .registration-box input[type="reset"]:hover {
            background-color: #6CA6A8;
        }
    </style>
</head>
<body>
<div class="registration-box">
    <h2>New User Registration</h2>
    <form action="register.php" method="post">
        <label for="user">Choose a user:</label><br>
        <select id="user" name="user">
            <option value="Doctor">Doctor</option>
            <option value="Pharmacist">Pharmacist</option>
            <option value="Patient">Patient</option>
        </select><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br><br>

        <input type="submit" value="Register">
    </form>
</div>
</body>
</html>
