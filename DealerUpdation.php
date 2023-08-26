<title>Customer Data Modification</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();

$dID=$_GET['GetID'];
$sql = "SELECT * from dealer natural join dealer_Contact where dealer_id='".$dID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
$dID = $row['Dealer_ID'];
$dName = $row['Name'];
$dPwd = $row['Password'];
$dNo = $row['Contact_No'];
$dVG = $row['Status'];
$dProf = $row['Profit'];
    
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
                            <h3 class="bg-success text-white text-center py-3"> Dealer Updation Form</h3>
                        </div>
                        <div class="card-body">

                            <form action="DealerActuallyUpdate.php?dID=<?php echo $dID?>" method="post">
                                <td> Name </td>
                                <input required pattern="[A-Za-z ]{5,25}" type="text" class="form-control mb-2" placeholder=" Dealer Name " name="dname" value="<?php echo $dName?>">
                                <td> Contact Number </td>
                                <input required pattern="[1-9]{1}[0-9]{9}" type="tel" class="form-control mb-2" placeholder=" Dealer Contact No" name="dno" value="<?php echo $dNo?>">
                                <td> Password </td>
                                <input required pattern="[A-Za-z0-9]{5,20}" type="password" class="form-control mb-2" placeholder=" Dealer Password " name="dpwd" value="<?php echo $dPwd?>">
</br>
                                <td> Status: </td>
                                <input checked type="radio" id="dvg" name="dvg" value="Active">
                                <label for="Active">Active</label>
                                <input type="radio" id="dvg" name="dvg" value="Inactive">
                                <label for="Inactive">Inactive</label><br></br>

                                <!-- <input type="number" class="form-control mb-2" placeholder=" Status " name="dvg" value="<?php echo $dVG?>">
                                <input type="number" class="form-control mb-2" placeholder=" Profit " name="dprof" value="<?php echo $dProf?>"> -->
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
