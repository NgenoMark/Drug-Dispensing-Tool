<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        h1{
            color: white;
        }

        body{
            background-color : black ;
        }
        button {
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

        button:hover {
            background-color: green;
            transition: scale(1.3);
            cursor: pointer;
        }

        .top_info{
            display : block ;
        }
    </style>
</head>
<header>

</header>
<body>

<?php include("header.php"); ?>

<div class = "top_info">
<?php
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<h1>Welcome, $username</h1>";
        }
        ?>

    
</div>
    <button onclick = "redirectTonewPatients()"> New Patient </button>
    <button onclick = "redirectToallPatients()"> Existing Patient </button>

    <script>
        function redirectTonewPatients(){
            window.location.href = "doctorsummary.php" ;
        }

        function redirectToallPatients(){
            window.location.href = "fetch.php";
        }
    </script>

<?php include("footer.php"); ?>

</body>
</html>