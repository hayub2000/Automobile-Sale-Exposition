<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
session_start();

if(isset($_POST['update']))
{
    $cID=$_GET['cID'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $cnic=$_POST['cnic'];
    $vID=$_POST['vid'];
    $txtvID=$_SESSION["Vehicle_ID"];
    $txtsID=$_SESSION["Staff_ID"];
    $txtrID=$_SESSION["Receipt_ID"];

    //$vID = NEW VEHICLE, $txtvID = OLD VEHICLE
    
    $checkVehicle="SELECT * from Vehicle where Staff_ID is null and Vehicle_ID='".$vID."'";
    $checkResult=mysqli_Query($conn,$checkVehicle);
    if($checkResult->num_rows>0) //if updated vehicle id is available for purchase
    {
        $query="UPDATE customer natural join customer_cnic set First_Name='".$fname."', Last_Name='".$lname."',Vehicle_ID='".$vID."' where CNIC='".$cnic."'";
        $query2="UPDATE customer_cnic set CNIC='".$cnic."' where CNIC='".$cnic."'";
        $result=mysqli_Query($conn,$query);
        $result2=mysqli_Query($conn,$query2);

        //set old vehicles staff id to null, to indicate it hasn't been sold
        $sqlVehicle = "UPDATE vehicle SET Staff_ID = null WHERE Vehicle_ID = '".$txtvID."'";
        $setVehicle = mysqli_Query($conn,$sqlVehicle);

        //set new vehicles staff id to indicate it has been sold
        $sqlNewVehicle="UPDATE vehicle set Staff_ID='".$txtsID."' where Vehicle_ID='$vID'";
        $setNew=mysqli_Query($conn,$sqlNewVehicle);

        //update receipts table to reflect this change
        $sqlReceipt="UPDATE Receipt set Vehicle_ID='$vID' where Receipt_ID='".$txtrID."'";
        $setReceipt=mysqli_Query($conn,$sqlReceipt);
    
        if($result && $result2 && $setVehicle && $setNew && $setReceipt)
        {
            
            header("Location: CustomerStaffView.php");
        }
        else
        {
            echo "Recheck your query";
        }
    } 

    else
    {
        echo "Vehicle not available";
        //header("location: CustomerView.php");
    }

}

?>