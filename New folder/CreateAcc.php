<?php
include("Connection.php");

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
		echo 'alert("This EPF Number is already taken! ");';
		echo 'window.location.href = "CreateAcc.php"';
		echo '</script>';
	}else{
		$sql1 = "INSERT INTO restaurant_staff(First_Name,Last_Name,address_Staff,phone_Number,user_Type,username,password) VALUES('$CusFName','$CusLName','$CusAddress','$Cus_Contact_Num','customer','$Cus_Username','$Cus_Password');";
	mysqli_query($conn,$sql1);
		echo '<script>';
		echo 'alert("Your account is now pending for approval!");';
	
		echo 'window.location.href = "CreateAcc.php"';
		echo '</script>';
	}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>



    <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/fontawesome.min.css">

<style>

@import url('https://fonts.googleapis.com/css?family=PT+Sans');

body{
  background: #fff;
  font-family: 'PT Sans', sans-serif;
}
h2{
  padding-top: 1.5rem;
}
a{
  color: #333;
}
a:hover{
  color: #da5767;
  text-decoration: none;
}
.card{
  border: 0.40rem solid #f8f9fa;
  top: 10%;
}
.form-control{
  background-color: #f8f9fa;
  padding: 20px;
  padding: 25px 15px;
  margin-bottom: 1.3rem;
}

.form-control:focus {

    color: #000000;
    background-color: #ffffff;
    border: 3px solid #da5767;
    outline: 0;
    box-shadow: none;

}

.btn{
  padding: 0.6rem 1.2rem;
  background: #da5767;
  border: 2px solid #da5767;
}
.btn-primary:hover {

    
    background-color: #df8c96;
    border-color: #df8c96;
  transition: .3s;

}
    </style>

</head>
<body>
    

<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
   <div class="card">
     <h2 class="card-title text-center">Create New Account</h2>
      <div class="card-body py-md-4">
       <form _lpchecked="1">
        
          <div class="form-group">
             <input type="text" class="form-control" name="Fname" placeholder="First Name">
        </div>

        <div class="form-group">
             <input type="text" class="form-control" name="Lname" placeholder="Last Name">
        </div>

        <div class="form-group">
             <input type="text" class="form-control" name="address" placeholder="Address">
        </div>

        <div class="form-group">
             <input type="text" class="form-control" name="contact_Num" placeholder="Contact No" required>
        </div>

        <div class="form-group">
             <input type="text" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="form-group">
             <input type="password" class="form-control" name="Password" placeholder="Password">
                            </div>
  
   <div class="d-flex flex-row align-items-center justify-content-between">
      <a href="#">Login</a>
      <input type="submit" name="submit" value="Login" class="w3-btn w3-section w3-teal w3-ripple w3-mobile" style="width: 100%">

          </div>
       </form>
     </div>
  </div>
</div>
</div>
</div>

</body>
</html>