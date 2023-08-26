<?php   
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}
?>
<title>Vehicle Registration</title>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Vehicle</title>
</head>

<body>
<fieldset>
<legend>Vehicle Registration Form</legend>
<form name="DataForm" method="post" action="VehicleCreate.php">
    
    <p>
    <label for="Registration Number">Registration Number: </label>
    <input required pattern="[A-Z]{3}-[0-9]{3}"  type="text" name="txtrNo" id="txtrNo">
    (ABC-123)    
</p>

    <p>
    <label for="Make">Make: </label>
    <input checked type="radio" name="txtMake" id="txtMake" value="Toyota">
    <label for="Toyota">Toyota</label>
    <input type="radio" id="txtMake" name="txtMake" value="Suzuki">
    <label for="Suzuki">Suzuki</label>
    <input type="radio" id="txtMake" name="txtMake" value="Honda">
    <label for="Honda">Honda</label>
    <input type="radio" id="txtMake" name="txtMake" value="Kia">
    <label for="Kia">Kia</label>
    <input type="radio" id="txtMake" name="txtMake" value="Hyundai">
    <label for="Hyundai">Hyundai</label>
    </p>

    <p>
    <label for="Type">Type: </label>  
    <input checked type="radio" id="txtType" name="txtType" value="Car">
    <label for="Car">Car</label>
    <input type="radio" id="txtType" name="txtType" value="Bike">
    <label for="Bike">Bike</label><br>
    </p>

    <p>
    <label for="Color">Color: </label>
    <input required pattern="[A-Za-z]{3,10}" type="text" name="txtColor" id="txtColor">
    </p>

    <p>
    <label for="Cost">Cost: </label>
    <input required pattern="[1-9]{1}[0-9]{4,7}" type="tel" name="txtCost" id="txtCost">
    (Must be 5-8 digits)       
    </p>

    <p>
    <label for="Engine Capacity">Engine Capacity: </label>
    <input required pattern="[1-9]{1}[0-9]{2,3}" type="tel" name="txtEC" id="txtEC">
    (Must be 3-4 digits)    
    </p>

    <p>
    <label for="Fuel Capacity">Fuel Capacity: </label>
    <input required pattern="[1-9]{1}[0-9]{1}" type="tel" name="txtFC" id="txtFC">
    (Must be 2 digits)      
    </p>

    <p>
    <label for="Seating Capacity">Seating Capacity: </label>
    <input required pattern="[1-9]{1}" type="tel" name="txtSC" id="txtSC">
    (Must be 1 digit)      
    </p>

    <p>
    <label for="Mileage">Mileage: </label>
    <input required pattern="[1-9]{1}[0-9]{2,7}" type="tel" name="txtMile" id="txtMile">
    (Must be 3-8 digits)    
</p>

    <p>
    <label for="Insurance">Insured: </label>
    <input checked type="radio" id="txtIns" name="txtIns" value="No">
    <label for="No">No</label>
    <input type="radio" id="txtIns" name="txtIns" value="Yes">
    <label for="Yes">Yes</label><br>
    </p>

    <p>
    <label for="Transmission">Transmission: </label>
    <input checked type="radio" id="txtTrn" name="txtTrn" value="Manual">
    <label for="Manual">Manual</label>
    <input type="radio" id="txtTrn" name="txtTrn" value="Automatic">
    <label for="Automatic">Automatic</label><br>
    </p>

    <p>
    <label for="DealerID">Dealer ID: </label>
    <select required name="Dealer_ID">
        <option disabled selected> Select Dealer ID </option>
        <?php $sqlidddd="SELECT * from Dealer where `Status`='Active'"; 
        $recordsss=mysqli_query($conn,$sqlidddd); 
        while($datav = mysqli_fetch_array($recordsss))
        {
            echo "<option value='". $datav["Dealer_ID"] ."'>  " .$datav['Dealer_ID'] .". " .$datav['Name'] ."</option>";  // displaying data in option menu
        }	
        ?>
    </select>
    </p>

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




$txtvID='';
$txtsID='';

if(isset($_POST['txtCost']) && isset($_POST['submit']) && isset($_POST['txtrNo']) && isset($_POST['txtMake']) && isset($_POST['txtType']) && isset($_POST['txtColor']) && isset($_POST['txtEC']) && isset($_POST['txtFC']) && isset($_POST['txtMile']) && isset($_POST['txtIns'])&& isset($_POST['txtTrn']))
{
    $txtrNo  = $_POST['txtrNo'];
    $sqlCheckrNo="SELECT * from vehicle where Registration_No='$txtrNo'";
    $resultrNo=mysqli_query($conn,$sqlCheckrNo);
    if($resultrNo->num_rows>0)
    {
        echo "This vehicle already exists";
    }
    else
    {
        $txtCost = $_POST['txtCost'];
    
        $txtMake = $_POST['txtMake'];
        $txtType = $_POST['txtType'];
        $txtColor = $_POST['txtColor'];
        //$txtTax = $_POST['txtTax'];
        $txtEC = $_POST['txtEC'];
        $txtFC = $_POST['txtFC'];
        $txtSC = $_POST['txtSC'];
        $txtMile = $_POST['txtMile'];
        $txtIns = $_POST['txtIns'];
        $txtTrn = $_POST['txtTrn'];

        $txtdID = $_POST['Dealer_ID'];
        
        //$txtsID=$_SESSION["StaffID"];
    
        $sqlv = "INSERT INTO vehicle(Registration_No,Cost,`Type`,Make,Color,Engine_Capacity,Fuel_Capacity,Seating_Capacity,Mileage,Insurance,Transmission,`Availability`,Dealer_ID) values ('$txtrNo','$txtCost','$txtType','$txtMake','$txtColor','$txtEC','$txtFC','$txtSC','$txtMile','$txtIns','$txtTrn','Available','$txtdID')";
    
        if(mysqli_query($conn,$sqlv))
        {
            echo "Vehicle Data Successfully Stored!";
        }
        else
        {
            echo "Vehicle Data Error";
        }
    }

    
}
    $conn->close();
?>




