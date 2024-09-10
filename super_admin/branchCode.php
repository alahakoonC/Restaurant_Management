<?php
include("../Connection.php");
$a2=$_GET['q2'];

$sql_B_Code="SELECT res_det_branch_name FROM restaurant_menu WHERE res_det_branch_code='$a';";
$query_B_Code = mysqli_query($conn,$sql_B_Code);

while($type=mysqli_fetch_array($query_B_Code)){
    echo $type['res_det_branch_name'];
}

?>