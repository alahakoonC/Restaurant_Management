
<?php
include("../Connection.php");


if(isset($_POST['submit'])){
    $First_Name = $_POST['first_Name'];
    $Last_Name = $_POST['last_Name'];
    $EPF = $_POST['epf'];
    $Address = $_POST['address'];
    $Contact_No = $_POST['contact_No'];
  //  $UserType = $_POST['userType'];
    $Branch_Code = $_POST['branch_Code'];
    $Branch_Name = $_POST['branch_Name'];
    $UserName = $_POST['userName'];
    $Password = $_POST['password'];
    

 
  
    $sql = "INSERT INTO restaurant_staff(First_Name	,Last_Name,EPF,address_Staff,phone_number,user_Type,Branch,Branch_Code,username,password) VALUES('$First_Name',' $Last_Name','$EPF','$Address','$Contact_No','Staff','$Branch_Name','$Branch_Code','$UserName','$Password')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script type ="text/javascript">';
        echo 'alert("Successfully Added!")';
        echo '</script>';
    }else{
        echo 'Data not saved';
        echo mysqli_error($conn);
    }
}

session_start();

?>



<!DOCTYPE html>
<html>
<head>
<title>Restaurant</title>
    <link rel="shortcut icon" type="image/jpg" href="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/50/000000/external-factory-industry-kiranshastry-lineal-color-kiranshastry.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<style>
    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .form-row .form-group {
        flex: 1;
        margin-right: 20px; /* Increased space between fields */
        box-sizing: border-box;
    }
    .form-row .form-group:last-child {
        margin-right: 0; /* Remove margin for the last item in the row */
    }
    .form-group {
        display: flex;
        flex-direction: column;
    }
    .form-group input {
        width: 100%;
    }
</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-win8-steel w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
  <span class="w3-bar-item w3-left">ABC Restaurant</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
     
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Mike</strong></span><br>
      <img width="48" height="48" src="https://img.icons8.com/external-filled-color-icons-papa-vector/48/external-Greeting-virtual-events-filled-color-icons-papa-vector.png" alt="external-Greeting-virtual-events-filled-color-icons-papa-vector" class="w3-circle w3-margin-right"/>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Views</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Add Staff Members</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div>
    
<p class="text-center" style="margin-top: 3%;">

<div class="w3-row">
    <div class="w3-row-padding w3-margin-bottom w3-half">
        <form method="post">
            <div class="form-row">
                <div class="form-group" style="flex: 1 0 45%;">
                <label class="control-label">&nbsp; First Name</label>
                    <input type="text" id="first_Name" name="first_Name" class="form-control" required>
                </div>
                <div class="form-group" style="flex: 1 0 45%;">
                <label class="control-label">&nbsp; Last Name</label>
                    <input type="text" id="last_Name" name="last_Name" class="form-control" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="branch_Name">EPF</label>
                    <input type="text" id="epf" name="epf" class="form-control" required>
                </div>
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="branch_Address">Contact No</label>
                    <input type="text" id="contact_No" name="contact_No" class="form-control" required>
                </div>
            </div>



            <div class="form-row">
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="userType">User Type</label>
                    <input type="text" id="userType" name="userType" class="form-control" value="Staff" disabled>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group" style="flex: 1 0 45%;">

                    <label for="branch_Phone_Number">Branch Code</label>
                    <input type="hidden" id="branch_Code_hidden" name="branch_Code" class="form-control" required>
                    <?php
                        include "../Connection.php";
                       // $sql2 = "SELECT 'branch_code' FROM restaurant_details";
                        $sql2 = "SELECT res_det_branch_code FROM restaurant_details";
                        $all_type = mysqli_query($conn,$sql2);

                        echo "<select name = 'branch_Code' onchange='showUser(this.value)' id='branch_Code' class='form-control' required>";
                        echo "<option value=''>--Select Branch Code--</option>";
                        while($type=mysqli_fetch_array($all_type)){
                            echo'<option>'.$type['res_det_branch_code'].'</option>';
                        }
                        echo "</Select>";

                        ?>


                </div>
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="branch_Name">Branch Name</label>
                    <input type="text" id="branch_Name" name="branch_Name" class="form-control" value="" required>
                </div>
            </div>


            <div class="form-row">
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="userName">Username</label>
                    <input type="text" id="userName" name="userName" class="form-control" required>
                </div>
                <div class="form-group" style="flex: 1 0 45%;">
                    <label for="branch_Code">Password</label>
                    <input type="text" id="password" name="password" class="form-control" required>
                </div>
            </div>

            <button type="submit" name="submit" class="w3-button w3-blue">Submit</button>
            <button type="submit" class="btn btn-warning" name="view" onclick="window.location.href='user_Details_View.php';">View Details</button>
        </form>
    </div>
</div>
  
<!-- End page content -->
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
<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("branch_Name").innerHTML="";
    return;
  } 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("branch_Name").value=this.responseText;
    }
  }
  xmlhttp.open("GET","barchname.php?q="+str,true);
  xmlhttp.send();
}
</script>




</body>
</html>
