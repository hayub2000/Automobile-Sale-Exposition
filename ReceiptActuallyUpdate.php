<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}


if(isset($_POST['update']))
{
    $rID=$_GET['rID'];
    $TP=$_POST['TC'];
    $PD=$_POST['PD'];

        $query="UPDATE Receipt set Total_Price='".$TP."',Purchase_Date='".$PD."' where Receipt_ID='".$rID."'";
        //$query2="UPDATE staff_cnic set CNIC='".$cnic."' where Staff_ID='".$sID."'";
        $result=mysqli_Query($conn,$query);
        //$result2=mysqli_Query($conn,$query2);
    
        if($result)
        {
            
            header("Location: ReceiptView.php");
        }
        else
        {
            echo "Recheck your query";
        }
    } 

?>