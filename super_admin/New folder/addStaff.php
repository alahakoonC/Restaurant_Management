<?php
include "../Connection.php";

// Handle form submission
if (isset($_POST['submit'])) {
    $First_Name = $_POST['first_Name'];
    $Last_Name = $_POST['last_Name'];
    $EPF = $_POST['epf'];
    $Address = $_POST['address'];
    $Contact_No = $_POST['contact_No'];
    $Branch_Code = $_POST['branch_Code'];
    $Branch_Name = $_POST['branch_Name'];
    $UserName = $_POST['userName'];
    $Password = $_POST['password'];
    
    $sql = "INSERT INTO restaurant_staff (First_Name, Last_Name, EPF, address_Staff, phone_number, user_Type, Branch, Branch_Code, username, password) 
            VALUES ('$First_Name', '$Last_Name', '$EPF', '$Address', '$Contact_No', 'Staff', '$Branch_Name', '$Branch_Code', '$UserName', '$Password')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo '<script type="text/javascript">';
        echo 'alert("Successfully Added!")';
        echo '</script>';
    } else {
        echo 'Data not saved: ' . mysqli_error($conn);
    }
}

// Fetch branch name via AJAX
if (isset($_POST['action']) && $_POST['action'] == 'fetchBranchName') {
    if (isset($_POST['branchCode'])) {
        $branchCode = $_POST['branchCode'];

        $stmt = $conn->prepare("SELECT branch_name FROM restaurant_details WHERE res_det_branch_code = ?");
        $stmt->bind_param("s", $branchCode);
        $stmt->execute();
        $stmt->bind_result($branchName);
        $stmt->fetch();

        echo $branchName;

        $stmt->close();
        $conn->close();
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restaurant</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 20px;
            box-sizing: border-box;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        .form-group input {
            width: 100%;
        }
    </style>
    <script>
        function fetchBranchName() {
            var branchCode = document.getElementById('branch_Code').value;
            
            if (branchCode) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '', true); // Send to the same page
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        document.getElementById('branch_Name').value = xhr.responseText;
                    }
                };
                xhr.send('action=fetchBranchName&branchCode=' + encodeURIComponent(branchCode));
            } else {
                document.getElementById('branch_Name').value = '';
            }
        }
    </script>
</head>
<body>

<form method="post">
    <div class="form-row">
        <div class="form-group">
            <label for="first_Name">First Name</label>
            <input type="text" id="first_Name" name="first_Name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_Name">Last Name</label>
            <input type="text" id="last_Name" name="last_Name" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="epf">EPF</label>
            <input type="text" id="epf" name="epf" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_No">Contact No</label>
            <input type="text" id="contact_No" name="contact_No" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="userType">User Type</label>
            <input type="text" id="userType" name="userType" class="form-control" value="Staff" disabled>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="branch_Code">Branch Code</label>
            <select id="branch_Code" name="branch_Code" class="form-control" onchange="fetchBranchName()">
                <option value="">--Select Branch Code--</option>
                <?php
                include "../Connection.php";
                $sql2 = "SELECT res_det_branch_code FROM restaurant_details";
                $all_type = mysqli_query($conn, $sql2);
                while ($type = mysqli_fetch_array($all_type)) {
                    echo '<option value="' . $type['res_det_branch_code'] . '">' . $type['res_det_branch_code'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="branch_Name">Branch Name</label>
            <input type="text" id="branch_Name" name="branch_Name" class="form-control" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="userName">Username</label>
            <input type="text" id="userName" name="userName" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" class="form-control" required>
        </div>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
