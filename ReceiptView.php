<title>Receipt Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$sql = "SELECT * from Receipt";
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
                                <td> Serial. No </td>
                                <td> Registration_No </td>
                                <td> Total Price (Rs.) </td>
                                <td> Purchase Date </td>
                                <td> Staff CNIC </td>
                                <td> Customer CNIC </td>
                                <!-- <td> Edit </td>
                                <td> Delete </td> -->
                            </tr>

                            <?php 
                                    $i=0;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $i+=1;
                                        $rID = $row['Vehicle_Registration_No'];
                                        $TP = $row['Total_Price'];
                                        $PD = $row['Purchase_Date'];
                                        $sID = $row['Staff_CNIC'];
                                        $vID = $row['Customer_CNIC'];
                            ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $rID ?></td>
                                        <td><?php echo $TP ?></td>
                                        <td><?php echo $PD ?></td>
                                        <td><?php echo $sID ?></td>
                                        <td><?php echo $vID ?></td>
                                        <!-- <td><a href="ReceiptUpdation.php?GetID=<?php echo $rID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <td><a href="ReceiptDeletion.php?Del=<?php echo $rID ?>"><body><i class='fas fa-trash' style='font-size:20px;color:black'></i></body></a></td> -->
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
