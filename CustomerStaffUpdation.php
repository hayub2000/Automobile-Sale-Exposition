<title>Customer Data Modification</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$cID=$_GET['GetID'];
$fname='';
$lname='';
$cnic='';
$sql = "Select * from customer c natural join customer_cnic where customer_id='".$cID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
    $cID = $row['Customer_ID'];
    $fname = $row['First_Name'];
    $lname = $row['Last_Name'];
    $cnic = $row['CNIC'];
    $vID = $row['Vehicle_ID'];
    $rID = $row['Receipt_ID'];
    $_SESSION["Vehicle_ID"]=$vID;
    $_SESSION["Receipt_ID"]=$rID;
    
?>
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
                            <h3 class="bg-success text-white text-center py-3"> Update Form in PHP</h3>
                        </div>
                        <div class="card-body">

                            <form action="CustomerStaffActuallyUpdate.php?cID=<?php echo $cID?>" method="post">
                                <input type="text" class="form-control mb-2" placeholder=" First Name " name="fname" value="<?php echo $fname?>">
                                <input type="text" class="form-control mb-2" placeholder=" Last Name " name="lname" value="<?php echo $lname?>">
                                <input type="number" class="form-control mb-2" placeholder=" CNIC " name="cnic" value="<?php echo $cnic?>">
                                <input type="number" class="form-control mb-2" placeholder=" Vehicle ID " name="vid" value="<?php echo $vID?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
