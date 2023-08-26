<title>Vehicle Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$sql = "SELECT * from Vehicle";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/bootstrap.css"/>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>View Records</title>
</head>
<body class="bg-dark">


</form>

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <!-- <form name="DataList" method="post" action="CustomerCreate.html">

                    <input type="submit" name="Submit" id="Submit" value="GENERATE NEW RECEIPT">
                    </p>     -->
                    <table class="table table-bordered">
                            <tr>
                                <td> Registration No </td>
                                <td> Cost </td>
                                <td> Type </td>
                                <td> Make </td>
                                <td> Color </td>
                                <td> Engine Capacity  </td>
                                <td> Fuel Capacity </td>
                                <td> Seating Capacity </td>
                                <td> Mileage </td>
                                <td> Insurance </td>
                                <td> Transmission </td>
                                <td> Availability </td>
                                <td> Dealer ID </td>
                                <td> Edit </td>
                                <!-- <td> Delete </td> -->
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $Rno = $row['Registration_No'];
                                        $Cost = $row['Cost'];
                                        $Type = $row['Type'];
                                        $Make = $row['Make'];
                                        $Color = $row['Color'];
                                        $EngineCapacity = $row['Engine_Capacity'];
                                        $FuelCapacity = $row['Fuel_Capacity'];
                                        $SeatingCapacity = $row['Seating_Capacity'];
                                        $Mileage = $row['Mileage'];
                                        $Insurance = $row['Insurance'];
                                        $Transmission = $row['Transmission'];
                                        $Availability = $row['Availability'];
                                        $DealerID = $row['Dealer_ID'];
                            ?>
                                    <tr>
                                        <!-- <td><?php echo $vID ?></td> -->
                                        <td><?php echo $Rno?></td>
                                        <td><?php echo $Cost ?></td>
                                        <td><?php echo $Type ?></td>
                                        <td><?php echo $Make ?></td>
                                        <td><?php echo $Color ?></td>
                                        <td><?php echo $EngineCapacity ?></td>
                                        <td><?php echo $FuelCapacity ?></td>
                                        <td><?php echo $SeatingCapacity ?></td>
                                        <td><?php echo $Mileage ?></td>
                                        <td><?php echo $Insurance ?></td>
                                        <td><?php echo $Transmission ?></td>
                                        <td><?php echo $Availability ?></td>
                                        <td><?php echo $DealerID ?></td>
                                        <td><a href="VehicleUpdation.php?GetID=<?php echo $Rno ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <!-- <td><a href="VehicleDeletion.php?Del=<?php echo $vID ?>"><body><i class='fas fa-trash' style='font-size:24px;color:black'></i></body></a></td> -->
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
