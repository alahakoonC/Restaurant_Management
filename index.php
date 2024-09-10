<?php
include ("Connection.php");

//$exists=false;

session_start();

if (isset($_POST['submit'])) {
	$Username = $_POST['username'];
	$Password = $_POST['password'];

	$sql1 = "SELECT * FROM restaurant_staff WHERE username = '$Username' AND password = '$Password'";
 	$result2 = mysqli_query($conn, $sql1);

 	
 	if(mysqli_num_rows($result2) == 1){

 		while ($type = mysqli_fetch_array($result2)){
    $_SESSION['user_Type']='';
			$_SESSION['user_Type'] = $type['user_Type'];
			}
			if($_SESSION['user_Type']==='admin'){
                $_SESSION['sessionUser']=$Username;
				header('location: super_admin/admin_Dashboard.php');
		//		header('location: admin/ad.php');
			}elseif ($_SESSION['user_Type']==='Staff') {
                $_SESSION['sessionUser']=$Username;
				header('location: staff/staff_Dashboard.php');
			
			}else{
			    $_SESSION['sessionUser']=$Username;
				header('location:HomeMain.php');
			   
			}
		
 	}else{
 	//	echo "Incorrect!!!";
 	echo'<div class = "alert alert-danger">';
 	echo'Incorrect Password!';
 	echo'</div>';
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

	<link rel="shortcut icon" type="image/jpg" href="https://hrsynergy.online//favicon.png"/>

</head>
<body class="w3-light-grey">

<div class="w3-main">
	<div class="w3-container w3-quarter w3-margin-top w3-card-4 w3-display-middle w3-mobile">
	
<form class="w3-mobile" method="post">

	<div class="w3-center w3-mobile" style="padding-bottom: 20px">
	
 <img src="https://img.icons8.com/clouds/100/000000/administrator-male.png" style="width:100px; padding-top:30px; padding-top:30px; padding-bottom:10px;">
		<h3 style="font-size: 23px; padding: 0; margin: 0; font-weight: 800;">Login</h3>
	</div>

	<div class="form-group w3-mobile">
		<label class="w3-label">Username</label>
		<input class="w3-input" type="text" name="username" required>
	</div>

	<div class="form-group w3-mobile">
		<label class="w3-label">Password</label>
		<input class="w3-input" type="password" name="password" id="password">
	</div>
	
	<div class="form-group w3-mobile">
		<input type="checkbox" name="" onclick="disPass()">&nbsp;Show Password
	</div>

	<div class="form-group w3-mobile">
		<input type="submit" name="submit" value="Login" class="w3-btn w3-section w3-teal w3-ripple w3-mobile" style="width: 100%">
	</div>

	<p><a href="CreateAccount.php">Don't have account? Please click here!</a></p>

</form>
</div>
</div>

<script>
    function disPass(){
        var x = document.getElementById("password");
        if(x.type === "password"){
            x.type = "text";
        }else{
            x.type = "password";
        }
    }
</script>

</body>
</html>