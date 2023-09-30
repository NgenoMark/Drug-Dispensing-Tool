<html>
    <head>

    <style>
        .topnav {
      width: 100%;
      position: fixed;
      top: 0;
      z-index: 9999;
      background-color: transparent;
      transition: background-color 0.3s; /* Add transition for smooth effect */

    }


h2{
  margin-right:350px;
}

.topnav.transparent {
      background-color: rgba(0, 0, 0, 0.6); /* Set the desired translucent background color */
    }

nav {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  padding: 15px;
  background-color: black;

}

.logo {
  color: white;
  font-size: 40px;
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
  margin-left:100px;
}

button:hover {
  background-color: green;
  transition: scale(1.3);
  cursor: pointer;
}

nav ul {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  list-style-type: none;
}

nav ul li {
  padding: 10px 15px;
  margin-right: 10px;
}

nav ul li a {
  color: white;
  text-decoration: none;
  font-weight: bold;
}

nav ul li a:hover {
  color: #ea1538;
  transition: 0.3s;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  /*background-color : black ; */
  padding-top : 0 ;
  margin: 0 ;
  /* background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/trust.png"); --> */
  overflow-x: hidden;
}

</style>

    </head>

    <body>
        <div class = "topheader">
        <nav class = "">

        <h2 class = "logo">Neta Pharmacy</h2>

        <ul>
            <li><a href="welcomepage.php#Home">Home</a></li>
            <li><a href="welcomepage.php#Service">Service</a></li>
        </ul>

        <button onclick = "redirectToWelcome()"> Log  Out </button>
        <script>
            function redirectToWelcome(){
                window.location.href = "logoutpage.html";
            }
        </script>
        </nav>

        </div>

    </body>
</html>