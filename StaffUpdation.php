<title>Customer Data Modification</title>
<script>
    function validateForm() {
  let x = document.forms["DataForm"]["age"].value;
  if (x < 18) {
    alert("Age must be greater than or equal to 18");
    return false;
  }
  let y = document.forms["DataForm"]["comm"].value;
  if(y>5)
  {
      alert("Commission cannot be above 5%");
      return false;
  }
//   var NewDate = new Date(2021,12,17);
//   let OldDate=document.forms["DataForm"]["hdate"].value;
//   if(OldDate>NewDate)
//   {
//       alert("New date can't exceed today's date!");
//       return false;
//   }
}
</script>
<?php
$conn = mysqli_connect("localhost","root","","project");
if($conn->connect_error)
{
    die("Connection Failed".$conn->connect_error);
}

session_start();



$sID=$_GET['GetID'];
$sql = "SELECT * from staff natural join staff_contact where CNIC='".$sID."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    
    $sID = $row['CNIC'];
    $fName = $row['First_Name'];
    $lName = $row['Last_Name'];
    $hDate = $row['Hire_Date'];
    $age = $row['Age'];
    $sal = $row['Salary'];
    $des = $row['Designation'];
    $comm = $row['Commission'];
    $con = $row['Contact_No'];
    $pass = $row['Password'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Staff Updation Form</title>
</head>
<body class="bg-dark">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-success text-white text-center py-3"> Staff Updation Form</h3>
                        </div>
                        <div class="card-body">

                            <form name="DataForm" onsubmit="return validateForm()" action="StaffActuallyUpdate.php?sID=<?php echo $sID?>" method="post">
                                <td>First Name: </td>
                                <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" First Name " name="fname" value="<?php echo $fName?>">
                                <td>Last Name: </td>
                                <input required pattern="[A-Za-z]{3,25}" type="text" class="form-control mb-2" placeholder=" Last Name " name="lname" value="<?php echo $lName?>">
                                <!-- <input type="number" class="form-control mb-2" placeholder=" CNIC " name="cnic" value="<?php echo $CNIC?>"> -->
                                <td> Age: </td>
                                <input required type="number" class="form-control mb-2" name="age" id="age" value="<?php echo $age?>"> 

                                <td> Gender: </td>
                                <input checked type="radio" id="gen" name="gen" value="Male">
                                <label for="Male">Male</label>
                                <input type="radio" id="gen" name="gen" value="Female">
                                <label for="Female">Female</label><br></br>

                                <!-- <td>Hire Date</td>
                                <input required type="date" class="form-control mb-2" placeholder=" Hire Date " name="hdate" value="<?php echo $hDate?>">
                                 <input required type="text" class="form-control mb-2" placeholder=" Designation " name="des" value="<?php echo $des?>">
                                 -->
                                <label for="">Designation: </label>
                                <input type="radio" id="des" name="des" value="Manager">
                                <label for="Manager">Manager</label>
                                <input checked type="radio" id="des" name="des" value="Salesperson">
                                <label for="Salesperson">Salesperson</label><br></br>
                                
                                <td>Salary: </td>
                                <input required pattern="[0-9]{4,9}" type="tel" class="form-control mb-2" placeholder=" Salary " name="sal" value="<?php echo $sal?>">
                                <td>Commission: </td>
                                <input step=0.1 required type="number" class="form-control mb-2" placeholder=" Commission " name="comm" value="<?php echo $comm?>">
                                
                                <td>Contact No: </td> 
                                <input required pattern = "[1-9]{1}[0-9]{9}" type="tel" class="form-control mb-2" placeholder=" Contact " name="con" value="<?php echo $con?>">
                                
                                <td>Password</td>
                                <input required pattern="[A-Za-z0-9]{5,10}" type="password" class="form-control mb-2" placeholder=" Password " name="pass" value="<?php echo $pass?>">
                                <button class="btn btn-primary" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>
