<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Dealer Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/dealerstyle.css">
	</head>

	<body> 
		<div class="wrapper">		
            <img src="image/blackcar.jpg" width="1450">
			<div class="form-inner">
				<form method="post" action="Dealer.php">
					<div class="form-header">
						<h3>Dealer Login</h3>
						<img src="image/sign-up.png" alt="" class="sign-up-icon">
					</div>
					<div class="form-group">
						<label for="">Dealer ID:</label>
						<input type="number" class="form-control" type="text" name="txtUser" id="txtUser">
					</div>
					<div class="form-group" >
						<label for="">Password:</label>
						<input type="password" class="form-control" type="text" name="txtPass" id="txtPass">
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
    //     header("Location: Dealer.html");
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

        $sql = "SELECT * FROM dealer WHERE Dealer_ID='$myusername' AND `Password`='$mypassword' and `Status`='Active'";

        $result = $conn->query($sql);

        if($result == FALSE) 
        { 
            die("Query error");
        }
        if ($result->num_rows>0)
        {
            $_SESSION["Dealer_ID"]=$myusername;
            echo "Valid";
            header("Location: DealerAccess.html");
        }
    else
    {
        echo "Username/Password does not exist.";
    }
}
?>

