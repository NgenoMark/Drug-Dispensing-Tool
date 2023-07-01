<!DOCTYPE html>
<html lang="en">
<head>
<title>WELCOME PAGE</title>
<link rel="stylesheet" href="style.css">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  padding: 30px;
  font-size: 35px;
}

.topnav {
  height: 100vh;
  width: 100%;
  margin: 0;
  padding: 0;
  background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/trust.png");
  background-size: cover;
  background-position: center;
}



nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top: 40px;
  padding-left: 10%;
  padding-right: 10%;
}

.logo {
  color: white;
  font-size: 40px;
}

/* Create two columns/boxes that float next to each other */
section::after {
  content: "";
  display: table;
  clear: both;
}

nav ul li {
  list-style-type: none;
  display: inline-block;
  padding: 10px 20px;
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

button {
  border: none;
  background: red;
  padding: 12px 30px;
  border-radius: 30px;
  color: white;
  font-weight: bold;
  font-size: 15px;
  transition: .4s;
}

button:hover {
  background-color : green ;
  transition: scale(1.3);
  cursor: pointer;
}



/* Style the footer */
footer {
  background-color: blue;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>
</head>
<body>

<div class="topnav">
  <nav>
    <h2 class="logo">Neta Pharmacy</h2>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Service</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
    <button onclick = "redirectToLoginPage()" type="button">Login</button>
    <script>
      function redirectToLoginPage(){
        window.location.href='both.php';
      }
    </script>
  </nav>
</div>

<section>
  <article>
    <h1>DETAILS</h1>
    <p>This is an application that assists in drug dispensing and is used by both doctors and pharmacists to assist in dispensing drugs to patients.</p>
    <p>The patients involved are either walk-in patients or patients sent from the hospital.</p>
    <p>Click on the <mark>Login</mark> link in the navigation bar above to proceed to the login page.</p>
    <p>You can also click on the <mark>Pharmacy Details</mark> link in the navigation bar above to view details concerning the pharmacy.</p>
  </article>
</section>

<footer>
  <p>SELECT ONE OF THE DISPLAYED LINKS TO PROCEED</p>
</footer>

</body>
</html>
