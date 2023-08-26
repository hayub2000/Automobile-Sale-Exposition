<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Staff Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/staffstyle.css">
	</head>

	<body> 
		<div class="wrapper">		
            <img src="image/coolcar (2).jpg" width="1450">
			<div class="form-inner">
				<form method="post" action="Staff.php">
					<div class="form-header">
						<h3>Staff Login</h3>
						<img src="image/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<div class="form-group">
						<label for="">Staff ID:</label>
						<input required type="number" class="form-control" type="text" name="txtUser" id="txtUser">
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input required pattern="[0-9A-Za-z]{5,10}" type="password" class="form-control" type="text" name="txtPass" id="txtPass">
					</div>
					<button>Log In</button>
				</form>
			</div>
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

<title>Login Verification</title>
<?php

session_start();


    $data=$_POST;
    // if (empty($data['txtUser']) || empty($data['txtPass']))
    // {
    //     header("Location: Staff.html");
    //     die('Please fill all required fields');
        
    // }

    $servername = "localhost";
    $username="root";
    $password ="";
    $dbname="project";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn -> connect_error) 
    {
        die("connection failed:".$conn->connect_error);
    }

    if (isset($_POST['txtUser']) && isset($_POST['txtPass'])) 
    {
        $myusername = $_POST['txtUser'];
        $mypassword = $_POST['txtPass'];
        
        //$mystaffID=$myusername;
        $sqlex="SELECT * FROM staff where CNIC='$myusername' AND `Password`='$mypassword' and Designation='Retired'";
        $sqlm = "SELECT * FROM staff where CNIC='$myusername' AND `Password`='$mypassword' and Designation='Manager'";
        $sql = "SELECT * FROM staff WHERE CNIC='$myusername' AND `Password`='$mypassword' and Designation!='Retired'";
        
        $result = $conn->query($sql);
        $resultm = $conn->query($sqlm);
        $resultex = $conn->query($sqlex);

        if($result == FALSE) 
        { 
            die("Query error");
        }
        else if($resultm == FALSE)
        {
            die("Query error Manager");
        }

        if ($resultm->num_rows>0)
        {
            $_SESSION["SCNIC"]=$myusername;
            echo "Manager Valid";
            header("Location: AdminAccess.html");
        }
        else if ($result->num_rows>0)
        {
            $_SESSION["SCNIC"]=$myusername;
            echo "Valid";
            header("Location: StaffAccess.html");
        }
        else if ($resultex->num_rows>0)
        {
            echo "Invalid Login Credentials";
        }
        else
        {
            echo "Username/Password does not exist.";
        }
    }
?>

