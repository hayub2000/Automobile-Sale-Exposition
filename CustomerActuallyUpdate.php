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
    //$cnic=$_POST['cnic'];
    //$vID=$_POST['vid'];
    $age=$_POST['age'];
    $gen=$_POST['gen'];
    $con=$_POST['con'];
    //$txtvID=$_SESSION["Vehicle_ID"];
    // $txtsID=$_SESSION["Staff_ID"];
    // $txtrID=$_SESSION["Receipt_ID"];

    $sql0 = "SELECT * from customer where CNIC='$cID'";
    $res0 = mysqli_query($conn,$sql0);
    $row0 = mysqli_fetch_assoc($res0);
    $oldcnic = $row0['CNIC'];

        $query="UPDATE customer natural join customer_contact set Contact_No='$con',Age='".$age."',Gender='".$gen."',First_Name='".$fname."', Last_Name='".$lname."' where CNIC='".$oldcnic."'";
        //$query2="UPDATE customer_cnic set CNIC='".$cnic."' where CNIC='".$oldcnic."'";
        $result=mysqli_Query($conn,$query);
        //$result2=mysqli_Query($conn,$query2);
        if($result)
        {
            
            header("Location: CustomerView.php");
        }
        else
        {
            echo "Recheck your query";
        }    
}

?>