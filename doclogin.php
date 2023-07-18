<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

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
    </style>
</head>
<body>
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
</body>
</html>