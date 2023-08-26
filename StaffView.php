<title>Staff Data List</title>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();

$myusername = $_SESSION['SCNIC'];

$sql = "SELECT * from staff natural join staff_contact where Designation!='Manager' or CNIC='$myusername'";
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
                                <td> Staff CNIC </td>
                                <td> First Name </td>
                                <td> Last Name </td>
                                <td> Age </td>
                                <td> Gender </td>
                                <td> Contact </td>
                                <td> Hire Date </td>
                                <td> Designation </td>
                                <td> Salary (Rs.) </td>
                                <td> Commission (%) </td>
                                <td> Password </td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $sID = $row['CNIC'];
                                        $fName = $row['First_Name'];
                                        $lName = $row['Last_Name'];
                                        $age = $row['Age'];
                                        $gen = $row['Gender'];
                                        $hDate = $row['Hire_Date'];
                                        $sal = $row['Salary'];
                                        $des = $row['Designation'];
                                        $comm = $row['Commission'];
                                        $con = $row['Contact_No'];
                                        $pass = $row['Password'];
                                        //$vID = $row['Vehicle_ID'];
                            ?>
                                    <tr>
                                        <td><?php echo $sID ?></td>
                                        <td><?php echo $fName ?></td>
                                        <td><?php echo $lName ?></td>
                                        <td><?php echo $age ?></td>
                                        <td><?php echo $gen ?></td>
                                        <td><?php echo $con ?></td>
                                        <!-- <td><?php echo $CNIC ?></td> -->
                                        <td><?php echo $hDate ?></td>
                                        <td><?php echo $des ?></td>
                                        <td><?php echo $sal ?></td>
                                        <td><?php echo $comm ?></td>
                                        
                                        <td> ****** </td>
                                        <!-- <td><?php echo $pass ?></td> -->
                                        <td><a href="StaffUpdation.php?GetID=<?php echo $sID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        <td><a href="StaffDeletion.php?Del=<?php echo $sID ?>"><body><i class='fas fa-trash' style='font-size:20px;color:black'></i></body></a></td>
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
