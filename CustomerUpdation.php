<title>Customer Data Modification</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();

$cID=$_GET['GetID'];
$fname='';
$lname='';
$cnic='';
$sql = "Select * from customer c natural join customer_contact where CNIC='".$cID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
        $cID = $row['CNIC'];
        $fname = $row['First_Name'];
        $lname = $row['Last_Name'];
        // $cnic = $row['CNIC'];
        $age = $row['Age'];
        $gen = $row['Gender'];
        $con = $row['Contact_No']
        // $vID = $row['Vehicle_ID'];
        // $rID = $row['Receipt_ID'];
        // $_SESSION["Vehicle_ID"]=$vID;
        // $_SESSION["Receipt_ID"]=$rID;
    
?>
<script>
    function validateForm() {
  let x = document.forms["DataForm"]["age"].value;
  if (x < 18 && x<99) {
    alert("Age must be greater than or equal to 18 and lower than 99");
    return false;
  }
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Updation Form</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3">Customer Updation Form</h3>
                        </div>
                        <div class="card-body">

                            <form name="DataForm" onsubmit="return validateForm()" action="CustomerActuallyUpdate.php?cID=<?php echo $cID?>" method="post">
                                <td>First Name: </td>    
                                <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" First Name " name="fname" value="<?php echo $fname?>">
                                <td>Last Name: </td> 
                                <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" Last Name " name="lname" value="<?php echo $lname?>">
                                <td>Age: </td> 
                                <input required type="number" class="form-control mb-2" placeholder=" Age " name="age" value="<?php echo $age?>">
                                <td>Gender: </td> 
                                <input checked type="radio" name="gen" value="Male">
                                <label for="Male">Male</label>
                                <input type="radio"  name="gen" value="Female">
                                <label for="Female">Female</label><br></br>
                                
                                <td>Contact No: </td> 
                                <input required pattern = "[1-9]{1}[0-9]{9}" type="tel" class="form-control mb-2" placeholder=" Contact " name="con" value="<?php echo $con?>">
                                
                                
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
