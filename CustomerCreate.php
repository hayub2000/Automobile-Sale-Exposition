<title>Receipt Creation</title>
<!DOCTYPE html>
<?php $conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

$txtrID='';
$txtcID='';
$txtsID='';

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<script>
    function validateForm() {
  let x = document.forms["DataForm"]["txtAge"].value;
  if (x < 18 && x<99) {
    alert("Age must be greater than or equal to 18, and cannot be greater than 99");
    return false;
  }
}
</script>
<body>
<fieldset>
<legend>Generate a Receipt</legend>
<form name="DataForm" method="post" onsubmit="return validateForm()">


    <p>
    <label for="FirstName">First Name: </label>
    <input required pattern = "[A-Za-z]{3,25}" type="text" name="txtfName" id="txtfName">
    (Atleast 3 characters)    
    </p>

    <p>
    <label for="LastName">Last Name: </label>
    <input required pattern = "[A-Za-z]{3,25}"  type="text" name="txtlName" id="txtlName">
    (Atleast 3 characters)    
    </p>

    <!-- <p>
    <label for="CNIC">CNIC: </label>
    <input required pattern = "[1-9]{1}[0-9]{12}" type="tel" name="txtCNIC" id="txtCNIC">
    (13 digits)    
    </p> -->

    <p>
    <label for="Contact">Contact Number: </label>
    <input required pattern = "[1-9]{1}[0-9]{9}" type="tel" name="txtCon" id="txtCon">
    (10 digits)    
    </p>

    <p>
    <label for="Age">Age: </label>
    <input required type="number" name="txtAge" id="txtAge">
    </p>

    <td> Gender: </td>
    <input checked type="radio" id="txtGen" name="txtGen" value="Male">
    <label for="Male">Male</label>
    <input type="radio" id="txtGen" name="txtGen" value="Female">
    <label for="Female">Female</label><br></br>

    <td> Vehicle Registration No: </td>
    <select required name="Registration_No">
    <option disabled selected> License Plate | Price </option>
    <?php $sqlz="SELECT * from Vehicle where `Availability`='Available'"; 
    $recordz=mysqli_query($conn,$sqlz); 
    while($datav = mysqli_fetch_array($recordz))
    {
        echo "<option value='". $datav["Registration_No"] ."'>  " .$datav['Registration_No'] ." | Rs." .$datav['Cost'] ."</option>";  // displaying data in option menu
    }	
    ?>
    

<p>&nbsp;</p>
        
    <p>
    <input type="submit" name="submit" id="submit" value="Submit">
    </p>

</form>
</fieldset>
</body>
</html>


<?php
session_start();



if(isset($_POST['txtCon']) && isset($_POST['Registration_No']) && isset($_POST['txtfName']) && isset($_POST['submit']) && isset($_POST['txtAge']) && isset($_POST['txtGen']) && isset($_POST['txtlName']))
{   
    $txtfName=$_POST['txtfName'];
    $txtlName=$_POST['txtlName'];
    
    $txtGen=$_POST['txtGen'];
    $txtAge=$_POST['txtAge'];

    $txtvLic=$_POST['Registration_No'];
    
    $txtCNIC=$_SESSION["CCNIC"];
    $txtsID=$_SESSION["SCNIC"];

    $txtCon=$_POST['txtCon'];

    $sqlv = "SELECT * from Vehicle where `Availability`='Available' and Registration_No='$txtvLic'";
    $result= mysqli_query($conn,$sqlv);

    if($result->num_rows>0)
    {
        echo "Vehicle available for purchase";

        //get vehicle id from license plate
        $getvid="SELECT * from Vehicle where Registration_No='$txtvLic'";
        $resget = $conn->query($getvid);
        $row=mysqli_fetch_assoc($resget);
        $txtvID=$row['Registration_No'];
        $txtPrice=$row['Cost'];
        $txtdID=$row['Dealer_ID'];

        $sqlconcheck="SELECT * from customer_contact where Contact_No='$txtCon'";

        $res2=mysqli_query($conn,$sqlconcheck);

        //if contact_No is present, then disallow purchase
        if($res2->num_rows>0)
        {
            echo "This contact number is already in use";
        }
        else //if contact number does not exist
        {
            $sqlc = "INSERT INTO customer VALUES ('$txtCNIC','$txtfName','$txtlName','$txtAge','$txtGen')";
            $sqlcon = "INSERT INTO customer_contact values('$txtCon','$txtCNIC')";
            $resc=mysqli_query($conn,$sqlc);
            $rescc=mysqli_query($conn,$sqlcon);
            if($resc && $rescc)
            {
                echo "Customer data added";
            }
            //create and store a receipt
            $sqlr = "INSERT INTO receipt(Vehicle_Registration_No,Total_Price,Purchase_Date,Customer_CNIC,Staff_CNIC)
            values ('$txtvLic','$txtPrice',CURDATE(),'$txtCNIC','$txtsID')";
            

            if(mysqli_query($conn,$sqlr))
            {
                echo "Receipt Data Successfully Stored!";
            }
            else
            {
                echo "Receipt Data Error";
            }
            $sqlcomm="SELECT * from staff where CNIC='$txtsID'";
            $rescomm=mysqli_query($conn,$sqlcomm);
            $rowcomm=mysqli_fetch_assoc($rescomm);
            $txtComm=$rowcomm['Commission'];

            $Store=($txtComm/100)*$txtPrice;
            $txtPrice=$txtPrice-$Store;
            //if vehicle purchased, set it to unavailable so it can't be purchased again
            $setveh="UPDATE vehicle set `Availability`='Sold' where Registration_No='$txtvID'";


            if(mysqli_query($conn,$setveh))
            {   
                //similarly, add cost of the vehicle to profit of the dealer the vehicle came from
                $setdeal="UPDATE Dealer set Profit=Profit+'$txtPrice-$Store' where Dealer_ID='$txtdID'";
                mysqli_query($conn,$setdeal);
                echo "Vehicle is now purchased\n";
            }
            else
            {
                echo "Error in vehicle purchase";
            }
        }
    }
    else
    {
    echo "Vehicle not available or does not exist";
    }

}
    $conn->close();
?>