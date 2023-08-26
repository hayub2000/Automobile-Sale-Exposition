<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}


if(isset($_POST['update']))
{
    $vID=$_GET['Rno'];
    //$rno=$_POST['rno'];
    $cost=$_POST['cost'];
    $type=$_POST['type'];
    $make=$_POST['make'];
    $ec=$_POST['ec'];
    $fc=$_POST['fc'];
    $sc=$_POST['sc'];
    $col=$_POST['color'];
    $mile=$_POST['mile'];
    $trn=$_POST['trn'];
    $ins=$_POST['ins'];

        $query="UPDATE Vehicle set Color='$col',Mileage='".$mile."',Insurance='".$ins."',Transmission='".$trn."', Type='".$type."',Make='".$make."',Engine_Capacity='".$ec."',Seating_Capacity='".$sc."',Fuel_Capacity='".$fc."' where Registration_No='".$vID."'";
        //$query2="UPDATE Vehicle_Registration set Vehicle_License='".$rno."' where Vehicle_ID='".$vID."'";
        $result=mysqli_Query($conn,$query);
        //$result2=mysqli_Query($conn,$query2);
    
        if($result)
        {
            
            header("Location: VehicleView.php");
        }
        else
        {
            echo "Recheck your query";
        }
    } 

?>