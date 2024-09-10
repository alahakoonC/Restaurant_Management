<?php
include ("Connection.php");

if(isset($_POST['submit'])){
    $CusFName = $_POST['Fname'];
    $CusLName = $_POST['Lname'];
    $CusAddress = $_POST['address'];
    $Cus_Contact_Num = $_POST['contact_Num'];
    $Cus_Username = $_POST['username'];
    $Cus_Password =$_POST['Password'];

    $sql = "SELECT * FROM restaurant_staff WHERE userName='$Cus_Username';";
    $result = mysqli_query($conn,$sql);


	if(mysqli_num_rows($result) >0){
		echo '<script>';
		echo 'alert("This username is already taken! ");';
		echo 'window.location.href = "CreateAccount.php"';
		echo '</script>';
	}else{
		$sql1 = "INSERT INTO restaurant_staff(First_Name,Last_Name,address_Staff,phone_Number,user_Type,username,password) VALUES('$CusFName','$CusLName','$CusAddress','$Cus_Contact_Num','customer','$Cus_Username','$Cus_Password');";
	mysqli_query($conn,$sql1);
		echo '<script>';
		echo 'alert("Your account is successfully created!");';
		echo 'window.location.href = "index.php"';
		echo '</script>';
	}
}

?>




<!DOCTYPE html>
<html>
<head>


<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/fontawesome.min.css">

	<title>Login</title>



</head>
<body class="w3-light-grey">

<div class="w3-main">
	<div class="w3-container w3-quarter w3-margin-top w3-card-4 w3-display-middle w3-mobile">
	
<form class="w3-mobile" method="post">

	<div class="w3-center w3-mobile" style="padding-bottom: 20px">
	
 <img src="https://img.icons8.com/clouds/100/000000/administrator-male.png" style="width:100px; padding-top:30px; padding-top:30px; padding-bottom:10px;">
		<h3 style="font-size: 23px; padding: 0; margin: 0; font-weight: 800;">Sign Up</h3>
	</div>

	<div class="form-group w3-mobile">
		<label class="w3-label">First Name</label>
		<input class="w3-input" type="text" name="Fname" required>
	</div>

    <div class="form-group w3-mobile">
		<label class="w3-label">Last Name</label>
		<input class="w3-input" type="text" name="Lname" required>
	</div>

	<div class="form-group w3-mobile">
		<label class="w3-label">Address</label>
		<input class="w3-input" type="text" name="address" id="address" required>
	</div>

    <div class="form-group w3-mobile">
		<label class="w3-label">Contact No</label>
		<input class="w3-input" type="text" name="contact_Num" id="contact_Num" required>
	</div>

    <div class="form-group w3-mobile">
		<label class="w3-label">Username</label>
		<input class="w3-input" type="text" name="username" required>
	</div>

    <div class="form-group w3-mobile">
		<label class="w3-label">Password</label>
		<input class="w3-input" type="password" name="Password" id="Password" required>
	</div>
	
	<div class="form-group w3-mobile">
		<input type="checkbox" name="" onclick="disPass()">&nbsp;Show Password
	</div>

	<div class="form-group w3-mobile">
		<input type="submit" name="submit" value="Login" class="w3-btn w3-section w3-teal w3-ripple w3-mobile" style="width: 100%">
	</div>


    <p><a href="index.php">Back</a></p>



</form>
</div>
</div>

<script>
    function disPass(){
        var x = document.getElementById("Password");
        if(x.type === "password"){
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>

</body>
</html>