<?php
include("Connection.php");

$sql = "SELECT * FROM tblproduct";
$result = mysqli_query($conn,$sql);



?>




<!DOCTYPE html>
<html>
<head>
<title>ABC Restaurant</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
    body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.menu {display: none}
.w3-bar-block .w3-bar-item {padding:20px}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("images/pexels-tirachard-kumtanom-112571-601169.jpg");
  min-height: 90%;
}
</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-medium w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">

  <div class="w3-display-middle w3-center">
    <span class="w3-text-white w3-hide-small" style="font-size:100px">ABC <br>Restaurant</span>
    <span class="w3-text-white w3-hide-large w3-hide-medium" style="font-size:60px"><b>thin<br>CRUST PIZZA</b></span>
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Let me see the menu</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Food');" id="myLink">
        <div class="w3-col s12 tablink w3-padding-large w3-hover-red">Food</div>
      </a>
     
     
    </div>

    <div id="Food" class="w3-container menu w3-padding-32 w3-white">
      <h1><b>Chicken Burger</b> <span class="w3-right w3-tag w3-dark-grey w3-round">Rs 500</span></h1>
      
      <hr>
   
      <h1><b>Pizza</b> <span class="w3-right w3-tag w3-dark-grey w3-round">Rs 1600</span></h1>
            <hr>
      
      <h1><b>Rice & Curry</b> <span class="w3-right w3-tag w3-dark-grey w3-round">Rs 200</span></h1>
      <br>
   
      <div class="w3-center">
      <p><a href="index.php" class="w3-button w3-teal w3-medium w3-center w3-round">More</a></p>
      
</div>
      <hr>

    </div><br>

  </div>
</div>

<!-- About Container -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">About Us</h1>
    <p>Welcome to ABC Hotel, where comfort meets culinary excellence</p>
    <p>njoy a range of dining experiences at our exclusive ABC restaurant branches</p>
    <h1><b>Opening Hours</b></h1>
    
    <div class="w3-row">
      <div class="w3-col s6">
        <p>Monday to Sunday 08.00 - 22.00</p>
        
      </div>
     
    </div>
    
  </div>
</div>


<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Contact</h1>
    <p>Find us at some address at some place or call us at 01234567</p>
       <p class="w3-xxlarge"><strong>Reserve</strong> a table, ask for today's special or just send us a message:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>



<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
