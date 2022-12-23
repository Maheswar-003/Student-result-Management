<?php
   $insert = false;
   $server="localhost";   
   $username="root";
   $password="";
   $database="studentdb";

   $con = mysqli_connect($server,$username,$password,$database);
   if(!$con){
       die("Connection to the dats base is failed due to" . mqsqli_connect_error());
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
    <form method="post" class="form-horizontal front-page">
        <h1>Register Student</h1>
        <?php
            if($insert == true){
            echo "<p class='submitted'>Your details are successfully submitted.</p>";
            }
        ?>

        <?php
            $ids=$_GET['id'];
            $showquery = "SELECT * FROM userstudent WHERE id=$ids";
            $showdata = mysqli_query($con,$showquery) or die( mysqli_error($con));;
            $row =  mysqli_fetch_assoc($showdata);

        if(isset($_POST['name'])){
            $id= $_GET['id'];
            $name=$_POST['name'];
            $branch=$_POST['branch'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            // $password = md5($password);
         
           $sql= "UPDATE `studentdb`.`userstudent` SET `id`='$id',`name`='$name',`branch`='$branch',`phone`='$phone',`email`='$email',`password`='$password' WHERE id=$id ";
         
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
        
        <div class="form-group">
            <label class="col-sm control-label">Student Name</label>
            <div class="col-sm">
                <input type="text" name="name" class="form-control" placeholder="Enter student name" value="<?php echo $row['name']; ?>" required />
            </div>
        </div>


        <div class="form-group">
            <label class="col-sm control-label">Branch</label>
            <div class="col-sm">
                <select class="form-control" name="branch" required>
                    <option value="<?php echo $row['branch'];?>" selected="selected"> - select branch - </option>
                    <option value="CST">CST</option>
                    <option value="IT">IT</option>
                    <option value="ETC">ETC</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Phone No</label>
            <div class="col-sm">
                <input type="number" name="phone" class="form-control" placeholder="Enter phone no" value="<?php echo $row['phone']?>" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Email</label>
            <div class="col-sm">
                <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php echo $row['email']?>" required />
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm control-label">Password</label>
            <div class="col-sm">
                <input type="password" name="password" class="form-control" placeholder="Enter passowrd" value="<?php echo $row['password']?>" required />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                <input type="submit" name="btn_register" class="btn btn-primary " value="Update">
                <a class="btn btn-warning" href="table_student.php" role="button">Back</a>
            </div>
        </div>
        <br>
    </form>
</body>

</html>
