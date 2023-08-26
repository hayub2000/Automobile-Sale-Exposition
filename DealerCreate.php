<title>Dealer Registration</title>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Dealer</title>
</head>

<body>
<fieldset>
<legend>Dealer Registration Form</legend>
<form name="DataForm" method="post" action="DealerCreate.php">

    <p>
    <label for="Dealer Name">Dealer Name: </label>
    <input required pattern="[A-Za-z ]{5,25}" type="text" name="txtdName" id="txtdName">
    (Atleast 5 characters)
    </p>

    <p>
    <label for="Dealer Contact No.">Dealer Contact No.: </label>
    <input required pattern="[1-9]{1}[0-9]{9}" type="tel" name="txtdNo" id="txtdNo">
    (Must be 10 digits)
    </p>
    
    <p>
    <label for="Password">Password: </label>
    <input required pattern="[A-Za-z0-9]{5,10}" type="password" name="txtPwd" id="txtPwd">
    (Atleast 5 characters, numbers allowed, special characters not allowed)     
    </p>

    <p>&nbsp;</p>

    <p>
    <input type="submit" name="Submit" id="Submit" value="Submit">
    </p>
</form>
</fieldset>
</body>
</html>

<?php
session_start();

$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}


$txtvID='';
$txtsID='';

if(isset($_POST['txtdName']) && isset($_POST['txtdNo']) && isset($_POST['txtPwd']))
{
    $txtdName = $_POST['txtdName'];
    $txtdNo  = $_POST['txtdNo'];
    $txtPwd = $_POST['txtPwd'];

    $txtdID='';
    // $sqlv = "INSERT INTO vehicle(Vehicle_ID,Cost,`Type`,Make,Color,Engine_Capacity,Fuel_Capacity,Seating_Capacity,Mileage,Insurance,Transmission,`Availability`,Dealer_ID) values ('$txtvID','$txtCost','$txtType','$txtMake','$txtColor','$txtEC','$txtFC','$txtSC','$txtMile','$txtIns','$txtTrn','Available','$txtdID')";
    
    $sqld= "INSERT into Dealer(Dealer_ID,`Password`,`Name`) values ('$txtdID','$txtPwd','$txtdName')";
    $resd=mysqli_query($conn,$sqld);
    $txtdID=mysqli_insert_id($conn);

    $sqldr = "INSERT INTO Dealer_Contact(Contact_No,Dealer_ID) VALUES ('$txtdNo','$txtdID')";
    $resdr=mysqli_query($conn,$sqldr);
    
    if($resdr)
    {
        echo "Dealer data successfully added";
    }   
    else
    {
        echo "Dealer already exists";
        $sqldel="DELETE FROM Dealer where Dealer_ID='$txtdID'";
        mysqli_query($conn,$sqldel);
    }
}
    $conn->close();
?>




