<title>Customer Data List</title>
<?php

session_start();

$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$sql = "SELECT * from Customer natural join Customer_CNIC";
$result = $conn->query($sql);


// Changes by hamza


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

<!-- <input type="password" class="form-control" type="text" name="txtPass" id="txtPass"> -->
    <!-- <select name="search" id="search" >
    <option value="" selected="selected" ></option>
    <option value="first_name" >Select First Name</option>
    <option value="last_name" >Select Last Name</option>
    <option value="c_nic" >Select CNIC</option>
    <option value="v_id" >Select Vehicle ID</option>  
</select>  -->
<!-- <p style="color:red"><?php echo "$Customer_Id"?></p> -->
<div>

<form method="post" action="CustomerViewStaff.php">
<input type="number" name="custID" id="custID" placeholder="Customer ID">
<input type="text" name="custFN" id="custFN" placeholder="First Name">
<input type="text" name="custLN" id="custLN" placeholder="Last Name">
<input type="number" name="custCNIC" id="custCNIC" placeholder="CNIC">
<input type="number" name="custVID" id="custVID" placeholder="Vehicle ID">
<input type="submit" value="search">
</form>
</div>

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
                                    
                                    while($row=mysqli_fetch_assoc($result))
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
<?php

if(isset($_POST['custFN']))
{
    echo $_POST['custFN'];
    $CNICSearch=$_POST['custFN'];
    $searchquery = "SELECT * from Customer natural join Customer_CNIC where First_Name='$CNICSearch'";
    $_SESSION["searchquery"]=$searchquery;
    header("Location: CustomerSearchResultStaff.php");
}
else
{
    $searchquery = "SELECT * from Customer natural join Customer_CNIC";
    $_SESSION["searchquery"]=$searchquery;
}

// if(isset($_POST['c_id']))
// {
//     $Customer_Id=$_POST['c_id'];

//     if(isset($_POST['First_name']))
//     {
//         $F_name=$_POST['First_name'];
    
//         if(isset($_POST['Last_name']))
//         {
//             $L_name=$_POST['Last_name'];
            
//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
                
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // ALL att
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID='".$Customer_Id."' and First_Name='".$F_name."' and Last_Name='".$L_name."' and Vehicle_ID=".$Vehicle_id."' and CNIC='".$C_nic."'";
//                     $_SESSION["myql"]=$myql;

//                 }
//                 else
//                 {
//                     // All Minus Vehicle_id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name and Last_Name=L_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All Minus Cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name and Last_Name=L_name and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     //ALL Minus Cnic and Vehicle ID
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name and Last_Name=L_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//         else
//         {
//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     //All minus Lname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     //All minus lname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     //All minus Lname and cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name  and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     //All minus Lname,cnic and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id and First_Name=F_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//     }
//     else
//     {
//         if(isset($_POST['Last_name']))
//         {
//             $L_name=$_POST['Last_name'];

//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
            
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All Minus Fname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and Last_Name=L_name and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     //All Minus Fname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and Last_Name=L_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All minus Fname and Cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and Last_Name=L_name and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // All Minus Fname,cnic and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and Last_Name=L_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//         else
//         {
//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
                
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All minus Fname,Lname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
            
//                 else
//                 {
//                     // All minus Fname,Lname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All minus Fname,Lname,cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id   and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // All minus Fname,Lname,cnic,vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where Customer_ID=Customer_Id  ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//     }
// }
// else
// {
//     if(isset($_POST['First_name']))
//     {
//         $F_name=$_POST['First_name'];

//         if(isset($_POST['Last_name']))
//         {
//             $L_name=$_POST['Last_name'];

//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All minus customer id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where First_Name=F_name and Last_Name=L_name and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // All minus customer id and cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where First_Name=F_name and Last_Name=L_name and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id,cnic and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//         else
//         {
//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
               
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id and lname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where First_Name=F_name and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id,lname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id,lname and cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where First_Name=F_name  and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id,lname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//     }
//     else
//     {
//         if(isset($_POST['Last_name']))
//         {
//             $L_name=$_POST['Last_name'];

//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id and fname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name and Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id fname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id,fname and cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name and Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id,fname,cnic and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  First_Name=F_name and Last_Name=L_name ";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//         else
//         {
//             if(isset($_POST['c_nic']))
//             {
//                 $C_nic=$_POST['c_nic'];
               
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id,fname,lname
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  Vehicle_ID=Vehicle_id and CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     // all minus customer id,fname,lname and vehicle id
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  CNIC=C_nic";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//             else
//             {
//                 if(isset($_POST['Vehicle_id']))
//                 {
//                     $Vehicle_Id=$_POST['Vehicle_id'];
//                     // all minus customer id,fname,lname,cnic
//                     $myql = "SELECT * from Customer natural join Customer_CNIC where  Vehicle_ID=Vehicle_id";
//                     $_SESSION["myql"]=$myql;
//                 }
//                 else
//                 {
//                     //    all minus    
//                     $myql = "SELECT * from Customer natural join Customer_CNIC";
//                     $_SESSION["myql"]=$myql;
//                 }
//             }
//         }
//     }
// }


?>