<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}


if(isset($_POST['update']))
{
    $sID=$_GET['sID'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $gen=$_POST['gen'];
    $con=$_POST['con'];
    //$cnic=$_POST['cnic'];
    //$hdate=$_POST['hdate'];
    $des=$_POST['des'];
    $sal=$_POST['sal'];
    $comm=$_POST['comm'];
    $pass=$_POST['pass'];

        $query="UPDATE staff natural join staff_contact set Contact_No='$con',Age='$age',Gender='$gen',`Password`='".$pass."', First_Name='".$fname."', Last_Name='".$lname."',Designation='".$des."',Salary='".$sal."',Commission='".$comm."' where CNIC='".$sID."'";
        //$query2="UPDATE staff_cnic set CNIC='".$cnic."' where Staff_ID='".$sID."'";
        $result=mysqli_Query($conn,$query);
        //$result2=mysqli_Query($conn,$query2);
    
        if($result)
        {
            
            header("Location: StaffView.php");
        }
        else
        {
            echo "Contact number already exists";
        }
    } 

?>