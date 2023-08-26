<title>Customer Data Modification</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();

$rID=$_GET['GetID'];
$sql = "Select * from Receipt where Receipt_ID='".$rID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
    $rID = $row['Receipt_ID'];
    $TP = $row['Total_Price'];
    $PD = $row['Purchase_Date'];
    $sID = $row['Staff_ID'];
    $vID = $row['Vehicle_ID'];
    
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

                            <form action="ReceiptActuallyUpdate.php?rID=<?php echo $rID?>" method="post">
                                <!-- <input type="number" class="form-control mb-2" placeholder=" Total Price " name="TP" value="<?php echo $TP?>">
                                <input type="date" class="form-control mb-2" placeholder=" Purchase Date " name="PD" value="<?php echo $PD?>"> -->
                                <!-- <input type="number" class="form-control mb-2" placeholder=" Staff ID " name="sID" value="<?php echo $sID?>"> -->
                                <!-- <input type="number" class="form-control mb-2" placeholder=" Vehicle ID " name="vID" value="<?php echo $vID?>"> -->
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
