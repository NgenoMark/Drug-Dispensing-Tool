<!DOCTYPE html>
<!-- when patient logs in they enter ssn to view rtheir details -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient</title>
    <style>
        body {
            background-image: url(images/high.jpg);
            background-color: #000;
            background-size: cover;
            background-position: center top 10%;
        }

        legend{
            color : white ;
        }

        label{
            color : white;
            justify-content : center;
        }

        form{
            width : 20% ;
        }

      
       

    </style>
</head>
<body>
    <form action="patientdashback.php" method="post">
        <fieldset>
            <legend>Please enter your SSN:</legend> <br>
            <label for="SSN">SSN:</label><br> <br>
            <input type="text" name="SSN" id="SSN"><br><br>
            <button type="submit">Search</button>
        </fieldset>
    </form>
</body>
</html>
