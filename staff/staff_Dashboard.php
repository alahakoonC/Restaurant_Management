<?php
include("../Connection.php");

$date = date("Y-m-d");
?>

<?php
session_start();
if($_SESSION['user_Type'] != "Staff"){
  header('location:../index.php');
}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/w3.css">

<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/fontawesome.min.css">

	<title>ABC Restaurant</title>
	
	<link rel="shortcut icon" type="image/jpg" href="https://img.icons8.com/external-itim2101-lineal-color-itim2101/64/000000/external-admin-big-data-itim2101-lineal-color-itim2101.png"/>

  <style>
p {
  background-image: url('../images/pexels-tirachard-kumtanom-112571-601169.jpg');;
}
</style>

   
</head>
<body class="w3-light-grey">

  <!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i></button>

    <!-- Top menu -->
    <nav class="navbar navbar-exapnd-md bg-dark navbar-dark justify-content-center">
    <a href="#" class="navbar-brand">ABC Restaurant</a>
    </nav>
</div>
      <!--Side menu  -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
<div class="w3-container w3-row">
    <div class="w3-container w3-row">
        <div class="w3-cl s4">
         
            
        </div>  
        <div class="w3-col s8 w3-bar">

           <i class="far fa-user-circle fa-lg"></i>
            <span>Welcome, <strong>Staff</strong></span><br>    
        </div>
    </div>
    <hr> 
    
    <div class="w3-bar-block">
 

  <a href="AddDepartments.php" class="w3-bar-item w3-button w3-padding"><img src="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/48/000000/external-factory-industry-kiranshastry-lineal-color-kiranshastry.png"/>View Branch</a><br>
  <a href="AddMenu.php" class="w3-bar-item w3-button w3-padding"><img src="https://img.icons8.com/cotton/48/000000/restaurant-menu.png"/>View Menu</a><br>
  <a href="#" class="w3-bar-item w3-button w3-padding"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/48/000000/external-users-online-money-service-flaticons-lineal-color-flat-icons.png"/>Customers</a><br>
    <a href="ApproveOrder.php" class="w3-bar-item w3-button w3-padding"><img src="https://img.icons8.com/external-color-line-collection-vinzence-studio/48/000000/external-approve-file-folder-color-line-collection-vinzence-studio-2.png"/> Requests</a><br>
         

    
    <a href="../signOut.php" class="w3-bar-item w3-button w3-padding"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/50/000000/external-sign-out-web-flaticons-lineal-color-flat-icons-7.png"/> Sign Out</a><br>
    
     

  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens  -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>


<!-- PAGE CONTENT -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

<!-- Header  -->
<header class="w3-container" style="padding-top:1px">
  <br><br>
    <h5><b><i class="fas fa-tachometer-alt"></i>My Dashboard</b></h5>
   <p></p>
</header>

  




</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>