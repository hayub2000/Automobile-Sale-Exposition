<title>Staff Data Removal</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
$sID=$_GET['Del'];
//$sql1 = "DELETE from staff where staff_ID='".$sID."'";
//$sql2 = "DELETE from staff_CNIC where staff_ID='".$sID."'";
//$sql3 = "DELETE from Receipts where Staff_ID='".$sID."'";

$sql1 = "UPDATE staff set Designation='Retired',Salary=0,Commission=0,Staff_Password='' where CNIC='".$sID."'";

$res1=$conn->query($sql1);
// $res2=$conn->query($sql2);
// $res3=$conn->query($sql3);

if($res1 )
{
    echo "Deletion successful!";
    header("Location: StaffView.php");
}
else
{
    echo "Record does not exist";
}

?>