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
    $email=$_POST['email'];
    $pgSubject=$_POST['pgSubject'];
    $ugSubject1=$_POST['ugSubject1'];
    $ugSubject2=$_POST['ugSubject2'];

    $sql="INSERT INTO `multiusercontrol`.`userteachersubject`(`name`, `email`, `pgSubject`, `ugSubject1`, `ugSubject2`) VALUES ('$name','$email','$pgSubject','$ugSubject1','$ugSubject2')";

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
    <form method="post" action="register_subject.php" class="form-horizontal front-page">
        <h1>Register Teacher's Subject</h1>
        <?php
            if($insert == true){
            echo "<p class='submitted'>Details are successfully submitted.</p>";
        }
        ?>
        <div class="form-group">
            <label class="col-sm control-label">Name</label>
            <div class="col-sm">
                <input type="text" name="name" class="form-control" placeholder="Enter teacher name" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Email</label>
            <div class="col-sm">
                <input type="text" name="email" class="form-control" placeholder="Enter email" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">PG Subject</label>
            <div class="col-sm">
                <input type="text" name="pgSubject" class="form-control" placeholder="Enter PG Subject" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">UG Subject1</label>
            <div class="col-sm">
                <input type="text" name="ugSubject1" class="form-control" placeholder="Enter UG 1st Subjcct" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">UG Subject2</label>
            <div class="col-sm">
                <input type="text" name="ugSubject2" class="form-control" placeholder="Enter UG 2nd Subject" required />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <input type="submit" name="btn_register" class="btn btn-primary " value="Submit">
                <a class="btn btn-warning" href="index.html" role="button">Back</a>
            </div>
        </div>
    
        <br>
    </form>
</body>

</html>

<!-- INSERT INTO `userteacher` (`Slno`, `name`, `department`, `id`, `position`, `experience`, `phone`, `email`, `password`, `date`) VALUES ('1', 'Somnath Sen', 'Computer Scinece and Technology(CST)', 'CST06IIEST', 'Associate Professor', '5', '9999999998', 'somnath1@gmail.com', '12345', current_timestamp()); -->