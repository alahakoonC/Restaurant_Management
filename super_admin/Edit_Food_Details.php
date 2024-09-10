<?php
include("../Connection.php");
?>

<!--Update Data-->

<?php
if(isset($_POST['update'])){
    $Meal_Name = $_POST['name'];
    $Meal_Code = $_POST['code'];
    $Meal_Price = $_POST['price'];
    $Branch_Code = $_POST['branch_Code'];
    $Updated_By = $_POST['updated_By'];

    if(isset($_FILES['image'])&& $_FILES['image']['error']==0){
        //get binary data of the file
        $image = file_get_contents($_FILES['image']['tmp_name']);
   $data = base64_encode($image);

    $ID = $_POST['id'];

    $update = "UPDATE tblproduct SET name='$Meal_Name',code=' $Meal_Code',price='$Meal_Price',branch_Code=' $Branch_Code' WHERE id ='$ID'";
    $query = mysqli_query($conn,$update);
    if($query){
        echo '<script type ="text/javascript">';
        echo 'alert("Successfully Updated!")';
        
        echo '</script>';
        echo 'window.location.href = "Edit_Food_Details.php";';
    }else{
        echo 'Data not saved';
        echo mysqli_error($conn);
    }

    }
}
?>

<!--Delete Data-->
<?php
if(isset($_POST['delete'])){
    $Meal_Name = $_POST['name'];
    $Meal_Code = $_POST['code'];
    $Meal_Price = $_POST['price'];
    $Branch_Code = $_POST['branch_Code'];
    $ID = $_POST['id'];

    $delete = "DELETE tblproduct WHERE id = '$ID'";
    $query = mysqli_query($conn,$delete);
    if($query){
        echo '<script type ="text/javascript">';
        echo 'alert("Successfully Deleted!")';
        
        echo '</script>';
        echo 'window.location.href = "Edit_Food_Details.php";';
    }else{
        echo 'Please try again!';
        echo mysqli_error($conn);
    }


}
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

<!--

<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/all.min.css">
<link rel="stylesheet" href="../css/fontawesome.min.css">

-->
<link rel="stylesheet" href="../css/bootstrap.css">
<style>

</style>
</head>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-win8-steel w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
  <span class="w3-bar-item w3-left">ABC Restaurant</span>
</div>




<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:50px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b> View Restaurant Details</b></h5>
  </header>


    
<p class="text-center" style="margin-top: 1%;">

<div class="w3-row">
<div class="table-responsive">
		<table class="table table-bordered">
            <tr class="table-info">
                <th>id</th>
                <th>Meal Name</th>
                <th>Meal Code</th>
                <th>Meal Price (Rs.)</th>

                <th>Image</th>

                <th>Branch Code</th>
                <th>Actions</th>
</tr>

<?php
include("../Connection.php");

$sql = "SELECT * FROM tblproduct";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['code'].'</td>';
        echo '<td>'.$row['price'].'</td>';

        echo '<td><img src="data:image/jpeg;base64,'.$row['image'].'" width="60" height="60"></td>';

        echo '<td>'.$row['branch_Code'].'</td>';

        echo '<td>';
       echo '<button onclick="openUpdateModal('.$row['id'].',\''.$row['name'] . '\', \''.$row['code'] . '\',\'' . $row['price'] . '\',\'' . $row['branch_Code'] . '\')" class="btn btn-warning btn-sm">Update</button>';
  
        echo '<form method="post" style="display:inline;">';
        echo '<input type="hidden" name="id" value="'.$row['id'].'">';
       
        echo '</form>'; 
        echo '&nbsp;&nbsp;&nbsp;';

        echo '<button onclick="openDeleteModal('.$row['id'].')" class="btn btn-danger btn-sm">Delete</button>';
        echo '<form method="post" style="display:inline;">';
        echo '<input type="hidden" name="id1" value="'.$row['id'].'">';
      
        echo '</form>';

        echo '</tr>';
    }
}

?>


</table>       
</div>
			</div>
   

    </div>
  
       <!-- Modal Structure - Update-->
       <div id="updateModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-dark-gray">
        <p>

            <span onClick="document.getElementById('updateModal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
           
            <h3>Update Food Details</h3>
</p>
</header>
<div class="w3-container">
    <form id="updateForm" method="post">
        <input type="hidden" name="id" id="modalId">
        <p>


        <div class="form-group">
            <label class="control-label">&nbsp; Meal Name:</label>
            <input type="text" name="name" id="modalMealName" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="control-label">&nbsp; Meal Code:</label>
            <input type="text" name="code" id="modalMealCode" class="form-control" required>
        </div>

        <div class="form-group">
                        <label class="control-label">&nbsp; Meal Price:</label>
                        <input type="text" name="price" id="modalMealPrice" class="form-control" required>
                    </div>
  
                    <div class="form-group">
                        <label class="control-label">&nbsp; Image:</label>
                        <input type="text" name="branch_Code" id="modalBranchCode" class="form-control" required>
                    </div>

   
                    <div class="form-group">
                        <label class="control-label">&nbsp; Branch Code:</label>
                        <input type="text" name="branch_code" id="modalBranchCode" class="form-control" required>
                    </div>

                  

                    <button type="submit" name="update" class="w3-button w3-khaki">Save Changes</button>
</p>
</form>
</div>
</div></div>
<!--DELETE MODAL-->

<div id="deleteModal" class="w3-modal">
  <div class="w3-modal-content w3-animate-top w3-card-4">
    <header class="w3-container w3-red">
        <p>
      <span onclick="closeDeleteModal()" class="w3-button w3-display-topright">&times;</span>
      <h2>Delete Confirmation</h2>
</p>
    </header>
    <div class="w3-container">
        <p>
      <p>Are you sure you want to delete this record?</p>
      <div style="text-align: center;">
        <button onclick="confirmDelete()" class="w3-button w3-green" name="delete" id="delete">Yes</button>
        <button onclick="closeDeleteModal()" class="w3-button w3-red">No</button>
      </div>
</p>
    </div>
  </div>
</div>

<!---->
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

//Modal (UPDATE)
function openUpdateModal(id, mealName, mealCode,mealPrice,branchCode) {
    document.getElementById('modalId').value = id;
    document.getElementById('modalMealName').value = mealName;
    document.getElementById('modalMealCode').value = mealCode;
    document.getElementById('modalMealPrice').value = mealPrice;
    document.getElementById('modalBranchCode').value = branchCode;
   // document.getElementById('modalBranchPhoneNumber').value = branchPhoneNumber;
   

    document.getElementById('updateModal').style.display = 'block';
    document.getElementById('deleteModal').style.display = 'none';
}

// Close the modal (UPDATE)
window.onclick = function(event) {
    if (event.target == document.getElementById('updateModal')) {
        document.getElementById('updateModal').style.display = 'none';
    }
}
function closeUpdateModal() {
    document.getElementById('updateModal').style.display = 'none';
}


    // open delete modal
    function openDeleteModal(idx) {
    window.deleteRecordId = idx;
    document.getElementById('deleteModal').style.display = 'block';
    document.getElementById('updateModal').style.display = 'none'; // Ensure update modal is hidden
}

function closeDeleteModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function confirmDelete() {
    if (window.deleteRecordId !== undefined) {
        window.location.href = 'Edit_Food_Details.php?delete=' + window.deleteRecordId;
    }
}

// Close the modals when clicking outside of them
window.onclick = function(event) {
    if (event.target == document.getElementById('updateModal')) {
 //       document.getElementById('updateModal').style.display = 'none';
 closeUpdateModal();
    }
    if (event.target == document.getElementById('deleteModal')) {
      //  document.getElementById('deleteModal').style.display = 'none';
      closeDeleteModal();
    }
}



</script>



</body>
</html>
