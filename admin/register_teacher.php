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
    $department=$_POST['department'];
    $id=$_POST['id'];
    $position=$_POST['position'];
    $experience=$_POST['experience'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password = md5($password);

    $sql="INSERT INTO `multiusercontrol`.`userteacher`(`name`, `department`, `id`, `position`, `experience`, `phone`, `email`, `password`) VALUES ('$name','$department','$id','$position','$experience','$phone','$email','$password')";

    if($con->query($sql) == true){
        // echo"Succesfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
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
    <link rel="stylesheet" href="register_teacher.css">
</head>

<body>
    <form method="post" action="register_teacher.php" class="form-horizontal front-page">
        <h1>Register Teacher</h1>
        <?php
            if($insert == true){
            echo "<p class='submitted'>Your details are successfully submitted.</p>";
        }
        ?>
        <div class="form-group">
            <label class="col-sm control-label">Name</label>
            <div class="col-sm">
                <input type="text" name="name" class="form-control" placeholder="Enter teacher name" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Department</label>
            <div class="col-sm">
                <select class="form-control" name="department" required>
                    <option value="" selected="selected"> - select branch - </option>
                    <option value="Computer Scinece and Technology(CST)">Computer Scinece and Technology(CST)</option>
                    <option value="Information Technology(IT)">Information Technology(IT)</option>
                    <option value="Electronics and Telicomunication(ETC)">Electronics and Telicomunication(ETC)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">ID</label>
            <div class="col-sm">
                <input type="text" name="id" class="form-control" placeholder="Enter ID" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Position</label>
            <div class="col-sm">
                <select class="form-control" name="position" required>
                    <option value="" selected="selected"> - select position - </option>
                    <option value="Assistant Professor">Assistant Professor</option>
                    <option value="Associate Professor">Associate Professor</option>
                    <option value="Professor">Professor</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Experience</label>
            <div class="col-sm">
                <input type="number" name="experience" class="form-control" placeholder="Enter year experience" required />
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
                <a class="btn btn-warning" href="index.html" role="button">Back</a>
            </div>
        </div>
        <br>
    </form>
</body>

</html>

<!-- INSERT INTO `userteacher` (`Slno`, `name`, `department`, `id`, `position`, `experience`, `phone`, `email`, `password`, `date`) VALUES ('1', 'Somnath Sen', 'Computer Scinece and Technology(CST)', 'CST06IIEST', 'Associate Professor', '5', '9999999998', 'somnath1@gmail.com', '12345', current_timestamp()); -->