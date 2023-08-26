<title>My Data</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
session_start();
$myusername=$_SESSION["Dealer_ID"];

$sql = "SELECT * from dealer natural join dealer_contact where Dealer_ID='$myusername'";
$result = $conn->query($sql);

$sqlv = "SELECT * from vehicle where Dealer_ID='$myusername'";
$resultv = $conn->query($sqlv);

$sqlr = "SELECT * from vehicle v, receipt r, dealer d where '$myusername' = v.Dealer_ID and v.Registration_No = r.Vehicle_Registration_No";
$resultr = $conn->query($sqlr);
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
    <title>Manage Dealer Records</title>
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
                    <table class="table table-bordered">My Info        
                            <tr>
                                <td> Dealer ID </td>
                                <td> Name </td>
                                <td> Contact No. </td>
                                <td> Status </td>
                                <td> Profit (Rs.) </td>
                                <td> Password </td>
                                <!-- <td> Edit  </td>
                                <td> Retire </td> -->
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $dID = $row['Dealer_ID'];
                                        $dName = $row['Name'];
                                        $dPwd = $row['Password'];
                                        $dNo = $row['Contact_No'];
                                        $dVG = $row['Status'];
                                        $dProf = $row['Profit'];
                                        //$vID = $row['Vehicle_ID'];
                            ?>
                                    <tr>
                                        <td><?php echo $dID ?></td>
                                        <td><?php echo $dName ?></td>
                                        
                                        <!-- <td><?php echo $dPwd ?></td> -->
                                        <td><?php echo $dNo ?></td>
                                        <td><?php echo $dVG ?></td>
                                        
                                        <td><?php echo $dProf ?></td>
                                        <td> ******* </td>
                                        <!-- <td><a href="DealerUpdation.php?GetID=<?php echo $dID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <td><a href="DealerDeletion.php?Del=<?php echo $dID ?>"><body><i class='fas fa-trash' style='font-size:20px;color:black'></i></body></a></td> -->
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <!-- <form name="DataList" method="post" action="CustomerCreate.html">

                    <input type="submit" name="Submit" id="Submit" value="GENERATE NEW RECEIPT">
                    </p>     -->
                    <table class="table table-bordered">My Vehicles
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
                                <!-- <td> Dealer ID </td> -->
                                <!-- <td> Edit  </td>
                                <td> Retire </td> -->
                            </tr>

                            <?php 
                                    
                                    while($rowv=mysqli_fetch_assoc($resultv))
                                    {
                                        $Rno = $rowv['Registration_No'];
                                        $Cost = $rowv['Cost'];
                                        $Type = $rowv['Type'];
                                        $Make = $rowv['Make'];
                                        $Color = $rowv['Color'];
                                        $EngineCapacity = $rowv['Engine_Capacity'];
                                        $FuelCapacity = $rowv['Fuel_Capacity'];
                                        $SeatingCapacity = $rowv['Seating_Capacity'];
                                        $Mileage = $rowv['Mileage'];
                                        $Insurance = $rowv['Insurance'];
                                        $Transmission = $rowv['Transmission'];
                                        $Availability = $rowv['Availability'];
                                        $DealerID = $rowv['Dealer_ID'];
                                        //$vID = $row['Vehicle_ID'];
                            ?>
                                    <tr>
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
                                        <!-- <td><a href="DealerUpdation.php?GetID=<?php echo $dID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <td><a href="DealerDeletion.php?Del=<?php echo $dID ?>"><body><i class='fas fa-trash' style='font-size:20px;color:black'></i></body></a></td> -->
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
