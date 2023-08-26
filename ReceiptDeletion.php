<title>Receipt Data Removal</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
$rID=$_GET['Del'];
$sql1 = "DELETE from Receipt where Receipt_ID='".$rID."'";
// $sql2 = "DELETE from staff_CNIC where staff_ID='".$sID."'";
$sql2 = "DELETE from Customer where Receipt_ID = '".$rID."'";

$res1=$conn->query($sql1);
$res2=$conn->query($sql2);
if($res1 && $res2)
{
    echo "Deletion successful!";
    header("Location: ReceiptView.php");
}
else
{
    echo "Record does not exist";
}

?>