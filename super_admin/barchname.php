<?php
include("../Connection.php");
$a=$_GET['q'];

$sql="SELECT res_det_branch_name FROM restaurant_details WHERE res_det_branch_code='$a';";
$query = mysqli_query($conn,$sql);

while($type=mysqli_fetch_array($query)){
    echo $type['res_det_branch_name'];
}

?>