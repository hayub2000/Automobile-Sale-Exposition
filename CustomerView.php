<title>Customer Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$sql = "SELECT * from customer natural join customer_contact";
$result = $conn->query($sql);
//$SQLCNIC = "Select * from Customer natural join Customer_CNIC";
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
    <title>Manage Customer Records</title>
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
                                <td> Customer CNIC </td>
                                <td> First Name </td>
                                <td> Last Name </td>
                                <td> Age </td>
                                <td> Gender </td>
                                <td> Contact No</td>
                                <!-- <td> Receipt ID</td> --> 
                                <td> Edit  </td>
                                <!-- <td> Delete </td> -->
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $cID = $row['CNIC'];
                                        $fName = $row['First_Name'];
                                        $lName = $row['Last_Name'];
                                        // $CNIC = $row['CNIC'];
                                        $Con = $row['Contact_No'];
                                        $Age = $row['Age'];
                                        $Gender = $row['Gender'];
                                        // $vID = $row['Vehicle_ID'];
                                        // $rID = $row['Receipt_ID'];
                            ?>
                                    <tr>
                                        <td><?php echo $cID ?></td>
                                        <td><?php echo $fName ?></td>
                                        <td><?php echo $lName ?></td>
                                        <!-- <td><?php echo $CNIC ?></td> -->
                                        <td><?php echo $Age ?></td>
                                        <td><?php echo $Gender ?></td>
                                        <td><?php echo $Con ?></td>
                                        <!-- <td><?php echo $vID ?></td>
                                        <td><?php echo $rID ?></td> -->
                                        <td><a href="CustomerUpdation.php?GetID=<?php echo $cID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <!-- <td><a href="CustomerDeletion.php?Del=<?php echo $cID ?>"><body><i class='fas fa-trash' style='font-size:20px;color:black'></i></body></a></td> -->
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
