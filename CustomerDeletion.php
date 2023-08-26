<title>Customer Data Removal</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
$cID=$_GET['Del'];

//Get receipt and vehicle ID before deletion
// $sql0 = "Select * from Customer where Customer_ID='".$cID."'";
// $res0 = $conn->query($sql0);
// $row0=mysqli_fetch_assoc($res0);
// $rID=$row0['Receipt_ID'];
// $vID=$row0['Vehicle_ID'];

//remove customer data
// $sql1 = "DELETE from Customer where Customer_ID='".$cID."'";
// $sql2 = "DELETE from Customer_CNIC where Customer_ID='".$cID."'";

//remove receipt of customer using receipt ID
// $sql3 = "DELETE from Receipt where Receipt_ID='$rID'";
// $res3 = $conn->query($sql3);

//set vehicle as available again using vehicle ID
// $sql4 = "UPDATE Vehicle set `Availability`='Available' where Vehicle_ID='$vID'";
// $res4 = $conn->query($sql4);

//subtract dealer profit, get dealer id vehicle cost through vehicle ID first
// $sql5 = "select * from Vehicle where Vehicle_ID='$vID'";
// $res5 = $conn->query($sql5);
// $row5 = mysqli_fetch_assoc($res5);
// $txtPrice = $row5['Cost'];
// $dID = $row5['Dealer_ID'];
// $sql6 = "UPDATE Dealer set Profit=Profit - '$txtPrice' where Dealer_ID='$dID'";
// $res6 = $conn->query($sql6);


// $res1=$conn->query($sql1);
// $res2=$conn->query($sql2);
if($res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res0)
{
    echo "Deletion successful!";
    header("Location: CustomerView.php");
}
else
{
    echo "Record does not exist";
}

?>