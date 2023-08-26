<?php
$conn = mysqli_connect("localhost","root","","project");
session_start();

$searchquery=$_SESSION["searchquery"];
echo $searchquery;
$res=mysqli_query($conn,$searchquery);

?>


<!DOCTYPE html>
<html lang="en">
</form >
    <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                    <!-- <form name="DataList" method="post" action="CustomerCreate.html">

                    <input type="submit" name="Submit" id="Submit" value="GENERATE NEW RECEIPT">
                    </p>     -->
                    <table class="table table-bordered">
                            <tr>
                                <td> Customer ID </td>
                                <td> First Name </td>
                                <td> Last Name </td>
                                <td> CNIC </td>
                                <td> Vehicle ID</td>
                                <td> Edit  </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $cID = $row['Customer_ID'];
                                        $fName = $row['First_Name'];
                                        $lName = $row['Last_Name'];
                                        $CNIC = $row['CNIC'];
                                        $vID = $row['Vehicle_ID'];
                            ?>
                                    <tr>
                                        <td><?php echo $cID ?></td>
                                        <td><?php echo $fName ?></td>
                                        <td><?php echo $lName ?></td>
                                        <td><?php echo $CNIC ?></td>
                                        <td><?php echo $vID ?></td>
                                        <td><a href="CustomerUpdation.php?GetID=<?php echo $cID ?>"><body><i class="fa fa-pencil-square-o" style="font-size:24px;color:black"></i></body></a></td>
                                        
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