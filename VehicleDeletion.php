<title>Vehicle Data Removal</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
$vID=$_GET['Del'];
$sql1 = "DELETE from Vehicle where Vehicle_ID='".$vID."'";
$sql2 = "DELETE from Vehicle_Registration where Vehicle_ID='".$vID."'";
$sql3 = "DELETE from Receipt where Vehicle_ID='".$vID."'";

$sql4 = "select * from Vehicle where Vehicle_ID='$vID'";
$res4 = $conn->query($sql4);
$row4 = mysqli_fetch_assoc($res4);
$txtPrice = $row4['Cost'];
$dID = $row4['Dealer_ID'];
$sql5 = "UPDATE Dealer set Profit=Profit - '$txtPrice' where Dealer_ID='$dID'";
$res5 = $conn->query($sql5);

$res1=$conn->query($sql1);
$res2=$conn->query($sql2);
if($res1 && $res2)
{
    echo "Deletion successful!";
    header("Location: VehicleView.php");
}
else
{
    echo "Record does not exist";
}

?>