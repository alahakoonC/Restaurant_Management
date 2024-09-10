<?php
include("../Connection.php");

if (isset($_POST['submit'])) {
    $Branch_Name = $_POST['meal_Name'];
    $Branch_Address = $_POST['branch_Address']; // Ensure this matches your form input type
    $Branch_Phone_Number = $_POST['branch_Phone_Number'];
    $Branch_Code = $_POST['branch_Code']; // This should match the <select> name attribute

    $sql = "INSERT INTO restaurant_details (res_det_branch_name, res_det_branch_address, res_det_branch_phone_number, res_det_branch_code) VALUES ('$Branch_Name', '$Branch_Address', '$Branch_Phone_Number', '$Branch_Code')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Added!")';
        echo '</script>';
    } else {
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        /* Add your custom styles here */
    </style>
    <script type="text/javascript">
        function brCode() {
            var select = document.getElementById("branch_Code");
            var selectedValue = select.options[select.selectedIndex].value;
            document.getElementById("branch_Code_hidden").value = selectedValue;
        }
    </script>
</head>
<body class="w3-light-grey">
    <div class="w3-bar w3-top w3-win8-steel w3-large" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
        <span class="w3-bar-item w3-left">ABC Restaurant</span>
    </div>

    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4"></div>
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
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i> Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Overview</a>
            <!-- Additional menu items -->
        </div>
    </nav>

    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:300px;margin-top:43px;">
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> Add Food Details</b></h5>
        </header>

        <div class="w3-row-padding w3-margin-bottom">
            <div>
                <p class="text-center" style="margin-top: 3%;">
                    <div class="w3-row">
                        <div class="w3-row-padding w3-margin-bottom w3-half">
                            <form method="post">
                                <div class="form-group">
                                    <label class="control-label">&nbsp; Meal Name</label>
                                    <input type="text" name="meal_Name" class="form-control" required>
                                    <br>

                                    <label class="control-label">&nbsp; Branch Address</label>
                                    <input type="text" name="branch_Address" class="form-control" required> <!-- Changed from file input to text input -->

                                    <br>

                                    <label class="control-label">&nbsp; Branch Code</label>
                                    <input type="hidden" name="branch_Code_hidden" id="branch_Code_hidden" class="form-control" required>

                                    <?php
                                    $sql2 = "SELECT branch_code FROM restaurant_details";
                                    $all_type = mysqli_query($conn, $sql2);

                                    if (!$all_type) {
                                        die("Query failed: " . mysqli_error($conn));
                                    }

                                    echo "<select name='branch_Code' id='branch_Code' onchange='brCode()' required>";
                                    echo "<option value=''>--Select Branch Code--</option>";

                                    while ($type = mysqli_fetch_array($all_type)) {
                                        $branch_code = htmlspecialchars($type['branch_code']);
                                        echo "<option value='$branch_code'>$branch_code</option>";
                                    }

                                    echo "</select>";
                                    ?>

                                    <br>

                                    <label class="control-label">&nbsp; Meal Price</label>
                                    <input type="text" name="meal_Price" class="form-control" required> <!-- Fixed name attribute -->

                                </div>

                                <button type="submit" class="btn btn-success" name="submit" value="Add">Add</button>
                                <button type="button" class="btn btn-warning" onclick="window.location.href='View_Restaurant_Details.php';">View Details</button> <!-- Changed type to button to avoid form submission -->
                            </form>
                        </div>
                    </div>
                </p>
            </div>
        </div>

        <footer class="w3-container w3-padding-16 w3-light-grey">
            <h4>FOOTER</h4>
            <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </footer>
    </div>

    <script>
        var mySidebar = document.getElementById("mySidebar");
        var overlayBg = document.getElementById("myOverlay");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>
</body>
</html>
