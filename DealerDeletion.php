<title>Staff Data Removal</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
$dID=$_GET['Del'];

$sql2 = "UPDATE Dealer set Status='Inactive',`Password`='' where Dealer_ID='".$dID."'";
$sql3 = "UPDATE Vehicle set `Availability`='Unavailable' where `Availability`='Available' and Dealer_ID='$dID'";

$res2=$conn->query($sql2);
$res3=$conn->query($sql3);

if($res2 && $res3)
{
    echo "Dealer is now inactive";
    header("Location: DealerView.php");
}
else
{
    echo "Record does not exist";
}

?>