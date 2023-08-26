<!DOCTYPE html>
<title>Staff Registration</title>
<head>
    <?php 
    session_start();

    $conn = mysqli_connect("localhost","root","","project");
    if($conn->connect_error)
    {
        die("Connection Failed".$conn->connect_error);
    }
    ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Employee</title>
</head>
<script>
    function validateForm() {
  let x = document.forms["DataForm"]["txtAge"].value;
  if (x < 18) {
    alert("Age must be greater than or equal to 18");
    return false;
  }
  let y = document.forms["DataForm"]["txtComm"].value;
  if(y>5)
  {
      alert("Commission cannot be above 5%");
      return false;
  }
}
</script>
<body>
<fieldset>
<legend>Employee Registration Form</legend>
<form name="DataForm" method="post" action="StaffCreate.php" onsubmit="return validateForm()">
    
    <p>
    <label for="CNIC">CNIC: </label>
    <input required pattern = "[1-9]{1}[0-9]{12}" type="tel" name="txtCNIC" id="txtCNIC">
    <!-- <input style="width:50px" type="number" name="txtCNIC" id="txtCNIC"> - <input style="width:110px" type="number" name="txtCNIC" id="txtCNIC"> -->
    (13 digits)
    </p>

    <p>
    <label for="FirstName">First Name: </label>
    <input required pattern = "[A-Za-z]{3,25}" type="text" name="txtfName" id="txtfName">
    (Atleast 3 characters)    
    </p>
    
    <p>
    <label for="LastName">Last Name: </label>
    <input required pattern = "[A-Za-z]{3,25}" type="text" name="txtlName" id="txtlName">
    (Atleast 3 characters)       
    </p>

    <p>
    <label for="Contact">Contact Number: </label>
    <input required pattern = "[1-9]{1}[0-9]{9}" type="tel" name="txtCon" id="txtCon">
    (10 digits)    
    </p>

    <p>
    <label for="Age">Age: </label>
    <input required type="number" name="txtAge" id="txtAge">
    </p>

    <p>
    <label for="Gender">Gender: </label>
    <input checked type="radio" id="txtGen" name="txtGen" value="Male">
    <label for="Male">Male</label>
    <input type="radio" id="txtGen" name="txtGen" value="Female">
    <label for="Female">Female</label><br>
    </p>

    <p>
    <label for="Password">Password: </label>
    <input required pattern="[A-Za-z0-9]{5,20}" type="password" name="txtPass" id="txtPass">
    (Atleast 5 characters, numbers allowed, special characters not allowed)    
    </p>

    <p>
    <label for="">Designation: </label>
    <input type="radio" id="txtDes" name="txtDes" value="Manager">
    <label for="Manager">Manager</label>
    <input checked type="radio" id="txtDes" name="txtDes" value="Salesperson">
    <label for="Salesperson">Salesperson</label><br>
    </p>

    <p>
    <label for="Salary">Salary: </label>
    <input required pattern = "[1-9]{1}[0-9]{3,10}" type="tel" name="txtSal" id="txtSal">
    (Atleast 4 digits)
    </p>

    <p>
    <label for="Commission">Commission: </label>
    <input required step=0.1 type="number" name="txtComm" id="txtComm" value=0>
    </p>

    <p>&nbsp;</p>

    <p>
    <input type="submit" name="Submit" id="Submit" value="Submit">
    </p>
</form>
</fieldset>
</body>
</html>


<title>Staff Data Entry</title>
<?php


if(isset($_POST['txtfName']) && isset($_POST['txtCon']) && isset($_POST['txtGen']) && isset($_POST['txtAge']) && isset($_POST['txtlName']) && isset($_POST['txtCNIC']) && isset($_POST['txtDes']) && isset($_POST['txtSal']) && isset($_POST['txtComm']) && isset($_POST['txtPass']))
{

    $txtfName=$_POST['txtfName'];
    $txtlName=$_POST['txtlName'];
    $txtCNIC=$_POST['txtCNIC'];
    $txtDes=$_POST['txtDes'];
    $txtSal=$_POST['txtSal'];
    $txtComm=$_POST['txtComm'];
    $txtAge=$_POST['txtAge'];
    $txtGen=$_POST['txtGen'];
    $txtCon=$_POST['txtCon'];
    //$txtDate=date('d/m/Y');
    $txtPass=$_POST['txtPass'];
    //$txtsID=$_SESSION["StaffID"];//$_POST['txtsID'];

    $sqlCNICheck="SELECT * from staff where CNIC = '$txtCNIC'";
    $resCNICheck=mysqli_query($conn,$sqlCNICheck);

    $sqlConCheck = "SELECT * from Staff_Contact where Contact_No = '$txtCon'";
    $resConCheck=mysqli_query($conn,$sqlConCheck);

    if($resCNICheck->num_rows>0 || $resConCheck->num_rows>0)
    {
        echo "This staff member already exists";
    }
    else
    {
        $sqlc = "INSERT INTO Staff(CNIC,`Password`,First_Name,Last_Name,Age,Gender,Hire_Date,Designation,Salary,Commission) VALUES ('$txtCNIC','$txtPass','$txtfName','$txtlName','$txtAge','$txtGen',CURDATE(),'$txtDes','$txtSal','$txtComm')";
        $sqlcont=  "INSERT INTO Staff_Contact values ('$txtCon','$txtCNIC')";

        if(mysqli_query($conn,$sqlc) && mysqli_query($conn,$sqlcont))
        {
            echo "Staff Data Successfully Stored!";
        }
        else
        {
            echo "Staff already exists";
        }
    }
}
$conn->close();
?>