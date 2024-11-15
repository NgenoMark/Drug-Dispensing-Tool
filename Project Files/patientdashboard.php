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

        <style>
        body {
            background-color: black;
        }

        .btn {
            border: none;
            background: red;
            padding: 12px 30px;
            border-radius: 30px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            transition: .4s;
            margin: 20px;
        }

        .btn:hover {
            background-color: green;
            transition: scale(1.3);
            cursor: pointer;
        }

        .welcome-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin: 20px;
            color: white;
        }

        .welcome-container h1 {
            margin-left: 20px;
        }
      
       

    </style>
</head>
<body>
    <form  method="post">
        <fieldset>
            <legend>Please enter your SSN:</legend> <br>
            <label for="SSN">SSN:</label><br> <br>
            <input type="text" name="SSN" id="SSN" required ><br><br>
            <button type="submit" formaction="patientdashback.php">Search</button>     
        </fieldset><br><br><br><br><br><br>


        <button  class = "btn" onclick = "redirectToLogout()"> Logout </button>

        <script>
            function redirectToLogout(){
            window.location.href = "logoutpage.html";
        }
        </script>
    </form>
</body>
</html>
