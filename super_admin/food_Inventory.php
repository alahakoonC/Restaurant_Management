
<?php
include("../Connection.php");


if(isset($_POST['submit'])){
    $Branch_Code = $_POST['branch_Code'];
    $Food_Name_Inven = $_POST['food_Name'];
    $Food_Price_Inven = $_POST['meal_Price'];
    $Food_Qty_Inven = $_POST['meal_Qty'];
    $Food_offer_Start_Date = $_POST['Offer_Start_Date'];
    $Food_offer_End_Date = $_POST['Offer_End_Date'];
    $Food_offer_Discount = $_POST['Offer_dis'];
    //$Food_offer_End_Date = $_POST['meal_Price'];

  
    $sql = "INSERT INTO restaurant_item_inventory(food_Name_inven,food_Price_inven,food_Qty_inven,food_Offer_Start_Date,food_Offer_End_Date,offer_Discount,branch_Code) VALUES('$Food_Name_Inven',' $Food_Price_Inven','$Food_Qty_Inven','$Food_offer_Start_Date','$Food_offer_End_Date','$Food_offer_Discount','$Branch_Code')";
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


?>



<!DOCTYPE html>
<html>
<head>
<title>Add Food Details</title>
    <link rel="shortcut icon" type="image/jpg" href="https://img.icons8.com/external-kiranshastry-lineal-color-kiranshastry/50/000000/external-factory-industry-kiranshastry-lineal-color-kiranshastry.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">

<!--

<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/fontawesome.min.css">

-->
<link rel="stylesheet" href="../css/bootstrap.css">
<style>

</style>


<script type="text/javascript">

//display branch code
function brCode(){
    document.getElementById("branch_Code").text;
}


//display meal name
function mealName(){
    document.getElementById("food_Name").text;
}

    </script>


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
      <span>Welcome, <strong>
        <?php
        session_start();
         echo ($_SESSION['sessionUser']);
        ?>
      </strong></span><br>
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
    <h5><b><i class="fa fa-dashboard"></i> Add Food Inventory</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div>
    
<p class="text-center" style="margin-top: 3%;">

<div class="w3-row">
		
		<div class="w3-row-padding w3-margin-bottom w3-half">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">

                <label class="control-label">&nbsp; Branch Code</label>
					<input type="hidden" name="branch_Code_hidden" id="branch_Code" class="form-control" required>
                    <select name = 'branch_Code' onchange='brCode();'id='branch_Codexxx' class='form-control' required>
                        <?php
                        include "../Connection.php";
                       // $sql2 = "SELECT 'branch_code' FROM restaurant_details";
                        $sql2 = "SELECT DISTINCT branch_code FROM restaurant_menu";
                        $all_type = mysqli_query($conn,$sql2);

                        echo "";
                        echo "<option >--Select Branch Code--</option>";
                        while($type=mysqli_fetch_array($all_type)){
                            echo'<option>'.$type['branch_code'].'</option>';
                        }
                        echo "";

                        ?>
</Select>
                    <br>

					<label class="control-label">&nbsp; Meal Name</label>
				
                    <input type="hidden" name="food_Name_hidden" id="food_Name" class="form-control" required>
                    <select name ='food_Name' onchange='showUser1(this.value)' id='food_Name' class='form-control' required>
<?php
include "../Connection.php";

$sql3 = "SELECT DISTINCT meal_Name FROM restaurant_menu ";
$all_type = mysqli_query($conn,$sql3);

//echo "";
echo "<option>--Select Meal--</option>";
while($type=mysqli_fetch_array($all_type)){
    echo'<option>'.$type['meal_Name'].'</option>';
}
//echo "</Select>";

?>
</Select>
<br>

<label class="control-label">&nbsp; Meal Price</label>
					<input type="text" name="meal_Price" id="meal_Price" class="form-control" required>
                

                    <br>

                    <label class="control-label">&nbsp;QTY:</label>
                    <input type="text" name="meal_Qty" id="meal_Qty" class="form-control" required>

                   <br>

                   <label class="control-label">&nbsp;Offer Start Date:</label>
                    <input type="date" name="Offer_Start_Date" id="Offer_Start_Date" class="form-control">

                    <br>

                    <label class="control-label">&nbsp;Offer End Date:</label>
                    <input type="date" name="Offer_End_Date" id="Offer_End_Date" class="form-control">

                    <br>

                    <label class="control-label">&nbsp;Offer:</label>
                    <input type="text" name="Offer_dis" id="Offer_dis" class="form-control">

                    <br>

				</div>

				

			
                <button type="submit" class="btn btn-success" name="submit" value="Add">Add</button>
				
                <button type="submit" class="btn btn-warning" name="view" onclick="window.location.href='View_Food_Details.php';">View Details</button>
				
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
function showUser1(str1) {
  if (str1=="") {
    document.getElementById("meal_Price").innerHTML="";
    return;
  } 
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("meal_Price").value=this.responseText;
      //document.getElementById("meal_Price").value=this.responseText;
    }
  }
   var xx=document.getElementById('branch_Codexxx').selectedOptions[0].innerHTML;
   
  xmlhttp.open("GET","foodPrice.php?qq="+str1+"&m="+xx+"",true);
  xmlhttp.send();
}
</script>

</body>
</html>
