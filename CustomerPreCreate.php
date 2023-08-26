<title>CNIC Verify</title>
<!DOCTYPE html>
<?php $conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

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
    <label for="CNIC">CNIC: </label>
    <input required pattern = "[1-9]{1}[0-9]{12}" type="tel" name="txtCNIC" id="txtCNIC">
    (13 digits)    
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

if(isset($_POST['txtCNIC']))
{
    $CCNIC=$_POST['txtCNIC'];
    $sql="SELECT * from Customer where CNIC='$CCNIC'";
    $res=mysqli_query($conn,$sql);
    
    if($res->num_rows>0)
    {
        //if data exists
        $_SESSION["CCNIC"]=$CCNIC;
        header("Location: CustomerBuy.php");
    }
    else 
    {
        //if data does not exist
        $_SESSION["CCNIC"]=$CCNIC;
        header("Location: CustomerCreate.php");
    }
}

?>