<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

if(isset($_POST['update']))
{

    $dID=$_GET['dID'];
    $dname=$_POST['dname'];
    $dpwd=$_POST['dpwd'];
    $dno=$_POST['dno'];
    $dvg=$_POST['dvg'];
    
        $query2="UPDATE Dealer_Contact set Contact_No='".$dno."' where Dealer_ID='".$dID."'";
        
        $result2=mysqli_Query($conn,$query2);
        if($result2)
        {
            $query="UPDATE dealer set `Status`='$dvg',`Password`='".$dpwd."', Name='".$dname."'where Dealer_ID='".$dID."'";
            $result=mysqli_Query($conn,$query);
            header("Location: DealerView.php");
        }
        else
        {
            echo "Contact number already exists";
        }
    } 

?>