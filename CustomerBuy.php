<title>Receipt Creation</title>
<!DOCTYPE html>
<?php $conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<fieldset>
<legend>Generate a Receipt</legend>
<form name="DataForm" method="post" onsubmit="return validateForm()">

    <td> Vehicle Registration No: </td>
    <select required name="Registration_No">
    <option disabled selected> License Plate | Price </option>
    <?php $sqlz="SELECT * from Vehicle where `Availability`='Available'"; 
    $recordz=mysqli_query($conn,$sqlz); 
    while($datav = mysqli_fetch_array($recordz))
    {
        echo "<option value='". $datav["Registration_No"] ."'>  " .$datav['Registration_No'] ." | Rs." .$datav['Cost'] ."</option>";  // displaying data in option menu
    }	
    ?>
    

<p>&nbsp;</p>
        
    <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    </p>

</form>
</fieldset>
</body>
</html>


<?php
session_start();

$CCNIC=$_SESSION["CCNIC"];
$txtsID=$_SESSION["SCNIC"];


if(isset($_POST['Registration_No']) && isset($_POST['submit']))
{
    $txtvLic=$_POST['Registration_No'];

    $sqlgetveh="SELECT * FROM VEHICLE where Registration_No='$txtvLic'";
    $resgetveh=mysqli_query($conn,$sqlgetveh);
    $rowgetveh=mysqli_fetch_assoc($resgetveh);

    $txtPrice=$rowgetveh['Cost'];
    $txtdID=$rowgetveh['Dealer_ID'];

    $sqlr = "INSERT INTO receipt(Vehicle_Registration_No,Total_Price,Purchase_Date,Customer_CNIC,Staff_CNIC)
    values ('$txtvLic','$txtPrice',CURDATE(),'$CCNIC','$txtsID')";

    if(mysqli_query($conn,$sqlr))
    {
        echo "Receipt Data Successfully Stored!";
    }
    else
    {
        echo "Receipt Data Error";
    }

    $sqlcomm="SELECT * from staff where CNIC='$txtsID'";
    $rescomm=mysqli_query($conn,$sqlcomm);
    $rowcomm=mysqli_fetch_assoc($rescomm);
    $txtComm=$rowcomm['Commission'];

    $Store=($txtComm/100)*$txtPrice;
    $txtPrice=$txtPrice-$Store;
    //if vehicle purchased, set it to unavailable so it can't be purchased again
    $setveh="UPDATE vehicle set `Availability`='Sold' where Registration_No='$txtvLic'";


    if(mysqli_query($conn,$setveh))
    {   
        //similarly, add cost of the vehicle to profit of the dealer the vehicle came from
        $setdeal="UPDATE Dealer set Profit=Profit+'$txtPrice-$Store' where Dealer_ID='$txtdID'";
        mysqli_query($conn,$setdeal);
        echo "Vehicle is now purchased\n";
    }
    else
    {
        echo "Error in vehicle purchase";
    }
    

}

?>
