<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New User Registration</title>
</head>
<body>

<form action="register.php" method="post">
  <fieldset>
    <legend>Registration of New User:</legend>

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
  </fieldset>
</form>

</body>
</html>