<?php
$insert = false;
if(isset($_POST['name'])){
   $server="localhost";   
   $username="root";
   $password="";

   $con=mysqli_connect($server,$username,$password);
   if(!$con){
       die("Connection to the dats base is failed due to" . mqsqli_connect_error());
   }

   $name=$_POST['name'];
   $branch=$_POST['branch'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $password=$_POST['password'];

  $sql1="INSERT INTO `studentdb`.`userstudent`(`name`, `branch`, `phone`, `email`, `password`) VALUES ('$name','$branch','$phone','$email','$password')";
if($con->query($sql1) == true){
    // echo"Succesfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql1 <br> $con->error";
}
if($_POST['branch']=='CST'){
  $sql2="INSERT INTO `studentdb`.`markscst`(`name`) VALUES ('$name')";
  if($con->query($sql2) == true){
    // echo"Succesfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql2 <br> $con->error";
}
}
else if($_POST['branch']=='IT'){
$sql3="INSERT INTO `studentdb`.`marksit`(`name`) VALUES ('$name')";
if($con->query($sql3) == true){
    // echo"Succesfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql3 <br> $con->error";
}
}
else if($_POST['branch']=='ETC'){
$sql4="INSERT INTO `studentdb`.`marksetc`(`name`) VALUES ('$name')";
if($con->query($sql4) == true){
    // echo"Succesfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql4 <br> $con->error";
}
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="register_student.css">
</head>

<body>
    <form method="post" action="register_student.php" class="form-horizontal front-page">
        <h1>Register Student</h1>
        <?php
            if($insert == true){
            echo "<p class='submitted'>Your details are successfully submitted.</p>";
            }
        ?>

        <div class="form-group">
            <label class="col-sm control-label">Student Name</label>
            <div class="col-sm">
                <input type="text" name="name" class="form-control" placeholder="Enter student name" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Branch</label>
            <div class="col-sm">
                <select class="form-control" name="branch" required>
                    <option value="" selected="selected"> - select branch - </option>
                    <option value="CST">CST</option>
                    <option value="IT">IT</option>
                    <option value="EETC">ETC</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Phone No</label>
            <div class="col-sm">
                <input type="number" name="phone" class="form-control" placeholder="Enter phone no" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Email</label>
            <div class="col-sm">
                <input type="text" name="email" class="form-control" placeholder="Enter email" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Password</label>
            <div class="col-sm">
                <input type="password" name="password" class="form-control" placeholder="Enter passowrd" required />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <input type="submit" name="btn_register" class="btn btn-primary " value="Register">
            </div>
        </div>
        <br>
    </form>
</body>

</html>