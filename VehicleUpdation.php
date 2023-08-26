<title>Vehicle Data Modification</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();

$vID=$_GET['GetID'];
$sql = "SELECT * from vehicle where Registration_No='".$vID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
    //$vID = $row['Vehicle_ID'];
    $Rno = $row['Registration_No'];
    $Cost = $row['Cost'];
    $Type = $row['Type'];
    $Make = $row['Make'];
    $EngineCapacity = $row['Engine_Capacity'];
    $FuelCapacity = $row['Fuel_Capacity'];
    $SeatingCapacity = $row['Seating_Capacity'];
    $Mileage = $row['Mileage'];
    $Insurance = $row['Insurance'];
    $Transmission = $row['Transmission'];
    $Color = $row['Color'];
    //$Availability = $row['Availability'];
    $DealerID = $row['Dealer_ID'];
    
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
                            <h3 class="bg-success text-white text-center py-3"> Vehicle Updation Form</h3>
                        </div>
                        <div class="card-body">

                            <form action="VehicleActuallyUpdate.php?Rno=<?php echo $Rno?>" method="post">
                                <!-- <td>License Plate: </td>    
                                <input type="text" class="form-control mb-2" placeholder=" Registration " name="rno" value="<?php echo $Rno?>">        -->
                                <!-- <td>Type: </td> -->
                                <!-- <input type="text" class="form-control mb-2" placeholder=" Type " name="type" value="<?php echo $Type?>"> -->
                                
                                <label for="Type">Type: </label>  
                                <input checked type="radio" id="type" name="type" value="Car">
                                <label for="Car">Car</label>
                                <input type="radio" id="type" name="type" value="Bike">
                                <label for="Bike">Bike</label><br></br>
                                
                                <td>Color: </td>
                                <input required pattern="[A-Za-z]{3,10}" type="text" class="form-control mb-2" placeholder=" Color " name="color" value="<?php echo $Color?>">
                                
                                <label for="Make">Make: </label>
                                <input checked type="radio" name="make" id="make" value="Toyota">
                                <label for="Toyota">Toyota</label>
                                <input type="radio" id="make" name="make" value="Suzuki">
                                <label for="Suzuki">Suzuki</label>
                                <input type="radio" id="make" name="make" value="Honda">
                                <label for="Honda">Honda</label>
                                <input type="radio" id="make" name="make" value="Kia">
                                <label for="Kia">Kia</label>
                                <input type="radio" id="make" name="make" value="Hyundai">
                                <label for="Hyundai">Hyundai</label><br></br>

                                <!-- <input type="text" class="form-control mb-2" placeholder=" Make " name="make" value="<?php echo $Make?>"> -->
                                <!-- <input type="number" class="form-control mb-2" placeholder=" Cost " name="cost" value="<?php echo $Cost?>"> -->
                                <td> Engine Capacity (cc):  </td>
                                <input required pattern="[1-9]{1}[0-9]{2,3}" type="tel" class="form-control mb-2" placeholder=" Engine Capacity " name="ec" value="<?php echo $EngineCapacity?>">
                                
                                <td> Fuel Capacity (litres):  </td>
                                <input required pattern="[1-9]{1}[0-9]{1}" type="tel" class="form-control mb-2" placeholder=" Fuel Capacity " name="fc" value="<?php echo $FuelCapacity?>">
                                
                                <td> Seating Capacity:  </td>
                                <input required pattern="[1-9]{1}" type="tel" class="form-control mb-2" placeholder=" Seating Capacity " name="sc" value="<?php echo $SeatingCapacity?>">
                                <td> Mileage: </td>
                                <input required pattern="[1-9]{1}[0-9]{2,7}" type="tel" class="form-control mb-2" placeholder=" Mileage " name="mile" value="<?php echo $Mileage?>">
                                
                                <label for="Insurance">Insured: </label>
                                <input checked type="radio" id="ins" name="ins" value="No">
                                <label for="No">No</label>
                                <input type="radio" id="ins" name="ins" value="Yes">
                                <label for="Yes">Yes</label><br></br>

                                <!-- <input type="text" class="form-control mb-2" placeholder=" Insurance " name="ins" value="<?php echo $Insurance?>"> -->
                                
                                <label for="Transmission">Transmission</label>
                                <input checked type="radio" id="trn" name="trn" value="Manual">
                                <label for="Manual">Manual</label>
                                <input type="radio" id="trn" name="trn" value="Automatic">
                                <label for="Automatic">Automatic</label><br></br>

                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
