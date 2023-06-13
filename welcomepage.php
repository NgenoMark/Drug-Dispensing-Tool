<!DOCTYPE html>
<html lang="en">
<head>
<title>WELCOME PAGE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: blue;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: right;
  width: 40%;
  height: 300px; /* only for demonstration, should be removed */
  background: orange;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

article {
  float: left;
  padding: 20px;
  width: 60%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section::after {
  content: "";
  display: table;
  clear: both;
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

<h2>DRUG DISPENSING TOOL APPLICATION</h2>
<header>
  <h2>WELCOME</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="Dlogin.html">Login a doctor </a></li><br>
      <li><a href="Plogin.html">Login as pharmacist</a></li><br>
      <li><a href="signin.html">Sign up if you are a new user  </a></li><br>
      <li><a href="signin.html">Pharmacy Details </a></li>
    </ul>
  </nav>
  
  <article>
    <h1>DETAILS</h1>
<p> This is an application that assists in drug dispensing and is used by both doctors and pharmacists to assist in dispensing drugs to patients. </p>
<p>The patients involved are either walk in patients  or patients sent from the hospital.</p>
<p>Click on one of the links on the right in order to proceed as directed.</p>
<p>You can also click on <mark>Pharmacy Details</mark> link to view details concerning the pharmacy</p>
  </article>
</section>

<footer>
  <p>SELECT ONE OF THE DISPLAYED LINKS PROCEED</p>
</footer>

</body>
</html>

