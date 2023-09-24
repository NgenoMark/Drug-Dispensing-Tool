<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: black;
        }

        .btn{
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
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<div class='welcome-container'><h1>Welcome, $username</h1></div>";
    }
    ?>

    <button class="btn" onclick="redirectToPatients()"> View Patients</button> <br>
    <button class="btn" onclick="redirectToInventory()"> Check Inventory </button> <br>
    <button class="btn" onclick="redirectToUsers()"> View all users </button> <br>
    <button class = "btn"  onclick="redirectToHistory()"> View History of Dispensing</button><br><br><br><br><br><br><br><br><br><br>
    <button  class = "btn" onclick = "redirectToLogout()"> Logout </button>


    <script>
        function redirectToPatients() {
            window.location.href = "fetch.php";
        }

        function redirectToInventory() {
            window.location.href = "inventoryfront.php";
        }

        function redirectToUsers() {
            window.location.href = ("users.php");
        }

        function redirectToHistory()
{
    window.location.href=("historyfetch.php")
}   

function redirectToLogout(){
            window.location.href = "logoutpage.html";
        }


</script>
</body>
</html>
