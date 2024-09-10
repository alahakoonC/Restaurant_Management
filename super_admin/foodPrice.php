<?php
include("../Connection.php");
$a1=$_GET['qq'];
$meal=$_GET['m'];

//$sql_Food_Price="SELECT res_det_branch_name FROM restaurant_details WHERE res_det_branch_code='$a';";
$sql_Food_Price="SELECT meal_Price FROM restaurant_menu WHERE meal_Name='$a1' and branch_code='$meal';";
$query_Food_Price = mysqli_query($conn,$sql_Food_Price);

while($type1=mysqli_fetch_array($query_Food_Price)){
    echo $type1['meal_Price'];
}

?>