<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
<title>WELCOME PAGE</title>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color : black ;
  padding-top : 80px ;
  margin: 0 ;
  /* background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/trust.png"); --> */
}

/* Style the header */
header {
  padding: 30px;
  font-size: 35px;
}

.topnav {
      width: 100%;
      position: fixed;
      top: 0;
      z-index: 9999;
      background-color: transparent;
      transition: background-color 0.3s; /* Add transition for smooth effect */

    }

.topnav.transparent {
      background-color: rgba(0, 0, 0, 0.6); /* Set the desired translucent background color */
    }

nav {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding: 20px;
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

nav ul {
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  list-style-type: none;
}

nav ul li {
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

.sticky-nav {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 999;
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
  background-color: green;
  transition: scale(1.3);
  cursor: pointer;
}

.front1 {
  position: relative;
  overflow: hidden;
  margin-top : 80px ;
}

.front1 h1 {
  position: relative;
  z-index: 2; /* Adjust the z-index value to ensure visibility */
}


#video-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Adjust the z-index as needed */
.home,
.line-and-avail,
.favicons {
  position: relative;
  z-index: 1;
}


h1{
  color : white ;
  text-align : center ;
  font-size : 2.7rem ;
  /* font-family: Albert Sans Bold; */

}

.home {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding-top: 20px;
}

.home p {
  color: white;
  font-family: "Albert Sans Medium";
  font-size: 1rem;
  line-height: 3rem;
  margin: 0;
  max-width: 50.25rem;
  margin-bottom: 20px; /* Added margin-bottom for spacing between <p> and button */
}

.front2 p {
  color :  white;
}

.regbutton {
  align-self: center; /* Adjusted to align the button in the center horizontally */
  background : #4E4FEB;
}

.line-and-avail {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 30px; /* Adjust the margin-top as desired */
  margin-bottom : 40px;
}

.line {
  background-color: #fff;
  height: 1px;
  opacity: 0.15;
  width: 132px;
  margin-right: 10px; /* Add some spacing between line and avail */
  margin-left: 10px; /* Add some spacing between line and avail */
}

.avail {
  color: white; /* Change the color to your desired color */
  font-size: 16px;
  line-height: 20px;
  margin: 0;
  white-space: nowrap;
}

.favicons {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px; /* Adjust the margin-top as desired */
}

.favicons img {
  width: 55px; /* Adjust the width of the favicons as desired */
  height: 55px; /* Adjust the height of the favicons as desired */
  margin: 0 5px;
  margin-top : 20px; /* Add spacing between the favicons */
  margin-bottom : 20px;

}

.front2 {
    display: grid ;
    align-items: center;
    text-align: center;
    gap : 10px;
  }

  .front2-row > div {
    flex: 0 0 calc(50% - 20px);
    margin: 0 10px;
  }

  .front2-p1 {
    grid-row : 2 / span 1;
    grid-column : 2 / span 2;
    font-size : 1.4rem;
    font-family: Albert Sans ExtraBold;
  }

  .front2-p2{
    grid-row : 3 / span 1;
    grid-column : 2 / span 2;
    font-size : 1.3rem;
    font-family: Albert Sans ExtraBold;
  }

  .front2-img {
    grid-row : 2 / span 2 ;
    margin-right: auto;
    margin-left: 10px;
    max-width: 100%;
  }


  @media (max-width: 767px) {
    .front2-row > div {
      flex: 0 0 100%;
    }
  }

  .front2-h1 {
  grid-row: 1/1;
  grid-column: 1/5;
  padding-top: 30px;
  color: white;
  font-size: 3.3rem;
  text-align: center;
  font-family: 'Libre Baskerville', serif;
  background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
}


.trustpage{
  align-items: center;
  background-color: #393E46;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding: 0.4166666667rem 0.125rem;
    position : relative ;
    width: 100%;
    height : 300px ;
}

h2{
  color : white ;
}

.trust {
    display: flex;
    justify-content: center;
    align-items: center;
  }

.trustimg {
    display: inline-block;
    background-size: cover;
    background-image: none;
    margin-right: 0.3333333333rem;
    width: auto!important;
  }

  .client-review{
    /*background-image : url("images/purple.jpg"); */
    background-color : black ;
    background-size : cover;
    background-position : center ;
    margin-top : 0px ;
    margin-bottom : 0px ;
    height : 500px;
    }

/* Style the footer */
.footer {
  background-color: #001C30;
  padding: 10px;
  text-align: center;
  color: white;
  display : flex;
  justify-content : space-between ;
}

li{
  color : white ;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}
</style>

<script>
window.addEventListener('scroll', function() {
  var nav = document.querySelector('.topnav');
  if (window.scrollY > 0) {
    nav.style.backgroundColor = 'rgba(0, 0, 0, 0.6)';
  } else {
    nav.style.backgroundColor = 'transparent';
  }
});

  </script>

</head>
<body>

<div class="topnav">
  <nav class = "">
    <h2 class="logo">Neta Pharmacy</h2>
    <ul>
      <li><a href="#Home">Home</a></li>
      <li><a href="#Service">Service</a></li>
      <li><a href="#contact-us">Contact Us</a></li>
    </ul>
    <button onclick = "redirectToLoginPage()" type="button">Login</button>
    <script>
      function redirectToLoginPage(){
        window.location.href='loginpage.php';
      }
    </script>
  </nav>
</div>
<div class = "front1"  id="Home" >
<video autoplay muted loop id="video-background">
    <source src="" type="video/mp4">
  </video>

  <h1>All in one Pharmacy and Medical checkup institution</h1>

  <div class="home"  style="color: white;">
    <p>We take medical care to the next level. Experience it yourself.</p>
    <button class="regbutton" onclick="redirectToRegisterPage()">Sign up for free</button>
    <script>
      function redirectToRegisterPage(){
        window.location.href = "registerf.php";
      }
    </script>
  </div>

  <div class="line-and-avail">
    <div class="line"></div>
    <p class="avail">Available on</p>
    <div class="line"></div>
  </div>
<div class="favicons">
  <a href="https://www.instagram.com/accounts/login/" target="_blank" title="Instagram page "><img src="images/instagram.png" alt="Instagram"></a>
  <a href="https://www.tiktok.com/login" target="_blank" title="TikTok page"><img src="images/tiktok.png" alt="TikTok"></a>
  <a href="https://www.facebook.com/login/" target = "_blank" title = "Facebook page"><img src="images/facebook.png" alt="Facebook"></a>
  <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Flogin%3Flang%3Den" target = "_blank" title = "Twitter page"> <img src="images\twitter.png" alt="Twitter"></a>
</div>
</div>


<div class  = "front2" id = "Service">
  <h1 class = "front2-h1" style =padding-top : 30px;> <i> Medical service anytime <br> and anywhere </i></h1>
  <div class = "front2-img">
  <a href=""> <img src="images/caduceus-symbol.png" alt=""></a>
  </div>
  <div class = "front2-p1">
  <p>Tired of the long queues ?</p>
  <p>Or having to look for specialists ?</p>
  <p>Do you want quick checkup's and analysis ?</p>
  </div>
  <div class = " front2-p2">
    <p>
      We'll then look no further at Neta Pharmacy we offer the best of services and medical care while thinking
      of your time. <br>
      If you are looking for a specialist doctor we have you covered with specialist available from on all working days. <br>
      Give us a call in case of emergencies and we will be there.<br> 
      You can book an appointment with us anytime you feel you need our services.
    </p>
  </div>
</div>

<section class = "trustpage">
  <h2>____________Trusted By_____________</h2>
<div class = "trust" >
  <div class="trustimg">
    <img src="images/pharm3.png" alt="">
  </div>
  <div class = "trustimg">
    <img src="images/whologo.png" alt="">
  </div>
 </div>
</section>



<div class = "client-review">
<style>
  .clients {
    background: linear-gradient(120deg, #454545 0, #e5f2f2 var(--gradient-x), #454545 100%);
    font-family: 'Albert Sans ExtraBold', sans-serif;
    font-style: italic ;
    font-size : 3rem ;
    margin: 0;
    text-align: center;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .clients h1 {
    color: white;
    font-size : 3rem ;

    -webkit-text-stroke: 2px #454545; /* Added text stroke for visibility */
  }
</style>

<div class="clients">
  <h1>What do our clients have to say about us?</h1>
</div>




<style>
  .container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .item {
    flex-basis: 27%;
    background-color: lightgray;
    height: 270px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding-top: 20px;
    box-sizing: border-box;
    margin-top: 25px;
    text-align: center;
    border-radius: 10px; /* Add this property for curved corners */
    margin-left : 30px;
    margin-right : 30px;
  }

  .favicons2 img {
    width: 30px;
    height: 30px;
    margin: 0 5px;
    margin-top: 15px;
    margin-bottom: 15px;
  }

  .name{
    font-size: large;
    font-weight : bold ;
  }
</style>

<div class="container">
  <div class="item">
    <div class="favicons2"> <img src="images/man.png" alt=""> </div>
    <div class="text">The best platform for quick  <br> medical attention. <br> The quality customer service is good. <br><br><br></div>
    <div class = "name">Jeremy Lynch</div>
    <div>⭐⭐⭐⭐⭐</div>
  </div>
  <div class="item">
    <div class="favicons2"> <img src="images/girl.png" alt=""> </div>
    <div class="text">Available every time I was in urgent need of help. <br> The fact that they can direct you through home procedures is wonderful.<br><br></div>
    <div class = "name">Ashley Wairimu</div> 
    <div>⭐⭐⭐⭐</div>
  </div>
  <div class="item">
    <div class="favicons2"> <img src="images/avatar.png" alt=""> </div>
    <div class="text">I booked an appointment and everything went well. <br> You do not disappoint as they are <br> right on schedule. <br><br></div>
    <div class = "name">Tom Kioo</div>
    <div>⭐⭐⭐⭐⭐</div>
  </div>
</div>
</div>


<style>
  .footer .summary{
    width : 350px ;
    margin-left : 170px ;
  }

  .summary h2 {
    font-size : 2rem ;
  }

  .contact h3{
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .contact h3:visited{
    color: black;
  }

  .contact a {
    color: black;
    text-decoration: none;
    cursor: pointer;

  }

  .contact a:visited{
    color : black ;
  }

</style>


<div class = "footer" id = "contact-us">
  <div class = "summary">
    <h2>Neta Pharmacy </h2> <br>
    <p>All you need in a single pharmacy trust us and experience it yourself.</p> <br> <br>
      <p color:black;> © 2023 Neta Pharmacy </p>
</div>
  
<div class = "contact">
    <h2> <i> Contact Us </i> </h2> <br>

     <h3><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=new"> Email </a>  </h3> 
     <h3><b>Phone number </b> 0329183829 </h3>  
    <h3><a href="https://www.google.com/maps/place/Komarock+Modern+Healthcare+Hospital/@-1.2750923,36.972682,17z/data=!3m1!4b1!4m6!3m5!1s0x182f6b5e2c9465d5:0x29f2e9455a358f70!8m2!3d-1.2750923!4d36.9752569!16s%2Fg%2F11bzp_x1qb?entry=ttu" target="_blank" rel="noopener noreferrer">  Location </a> </h3>
  </div>
</div>



</body>
</html>
