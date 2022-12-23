<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"studentdb");
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>
    <link rel="stylesheet" href="teacher_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="loggedin">
    <section id="title">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="teacher_page.php">Teacher Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav me-2">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="teacher_page.php">Home</a>
                        </li>
        
                        <li class="nav-item">
                            <a class="nav-link" href="teacher_teaching.php">Teaching</a>
                        </li>

                    </ul>
                </div>
                <form form action="logout.php" method="post"  class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </section>

    <section id="content">

    <?php
        $query = "select * from userteacher where id = '$_SESSION[id]'";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
	?>
        <div class="container-fluid row teacher-body">
            <div class="card left">
                <!-- <img src="" class="card-img-top" alt="..."> -->
                <div class="teacher-title">
                    <i class="fas fa-user teacher-img"></i>
                    <h5 class="card-title teacher-name"><?php echo $row['name']?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <p><b><?php echo "Professor in Department of "; echo $row['department']?></b></p>
                    <p><i class="fas fa-phone"></i><?php echo $row['phone']?></p>
                    <p><i class="fas fa-envelope"></i> <?php echo $row['email']?></p>
                    </p>
                </div>
            </div>
            <div class="card right">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Information</h3><br>
                    <p class="card-text">
                    <p><b>Depertment: </b><?php echo $row['department']?></p>
                    <p><b>Subject Code: </b><?php echo $row['department'].$row['id']?></p>
                    </p>
                </div>
            </div>
            

        </div>
    <?php
        }	
    ?>
    </section>
    <font size="10"><b> UPDATE MARKS </b></font>
    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> Name</th>
                                <th> Marks</th>
                                <th> Update </th>
                            </tr>
                        </thead>
    <tbody>
    <?php
    $query="SELECT department from userteacher WHERE name='$_SESSION[name]'";
    
    $result = mysqli_query($connection,$query);
    if (mysqli_num_rows($result) > 0) {
        while($rowData = mysqli_fetch_array($result)){
            if($rowData["department"] =='CST'){
                
                $query = "SELECT * FROM markscst";
                $query_run = mysqli_query($connection, $query);
                if($query_run)
                {
                    while($row = mysqli_fetch_array($query_run)){

                        echo "<tr>";
    
                        echo "<td>" . $row['name'] . "</td>";
    
                        echo "<td>" . $row['sub'.$row['id']] . "</td>";
                        
                        echo "<td> <a class='button' href='update3.php'>Update </td>";
                    
                        echo "</tr>";
    
                        }
                }
            }
            else if($rowData["department"] =='IT'){
                    $query = "SELECT * FROM marksit";
                    $query_run = mysqli_query($connection, $query);
                if($query_run)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {   
                        
                        echo "<tr>";
    
                        echo "<td>" . $row['name'] . "</td>";
    
                        echo "<td>" . $row['sub'.$row['id']] . "</td>";
                        
                        echo "<td> <a class='button' href='update4.php'>Update </td>";
                    
                        echo "</tr>";
                    }
                    }
                }
                else if($rowData["department"] =='ETC'){
    
                        $query = "SELECT * FROM marksetc";
                        $query_run = mysqli_query($connection, $query);
                        if($query_run)
                    {
                        while($row = mysqli_fetch_array($query_run))
                        {   
                           
                            echo "<tr>";
    
                            echo "<td>" . $row['name'] . "</td>";
        
                            echo "<td>" . $row['sub'.$row['id']] . "</td>";
                            
                            echo "<td> <a class='button' href='update5.php'>Update </td>";
                        
                            echo "</tr>";
    
                        }
                    } 
                }
        }
    }
      
    ?>
    </tbody>
</table>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</html> -->


<!-- INSERT INTO `userteacher` (`Slno`, `name`, `department`, `id`, `position`, `experience`, `phone`, `email`, `password`, `date`) VALUES ('1', 'Somnath Sen', 'Computer Scinece and Technology(CST)', 'CST06IIEST', 'Associate Professor', '5', '9999999998', 'somnath1@gmail.com', '12345', current_timestamp()); -->
<!-- <?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"srms");
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <title>Professor Dashboard</title>
</head>
<body>
  <style>
    th{
      text-align: center;
    }
  </style>
    <div class="container">
        <div class="jumbotron">
          <div class="col-md-12">
              <hr>
          </div>

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'srms');


                $query = "SELECT * FROM studentwisemarks";
                $query_run = mysqli_query($connection, $query);
                $proname = $_SESSION['username'];               // something like this is optional, of course
                $proid = substr($proname,4);
            ?>

            <div class="row">
                <div class="col-md-12">
                  <h3>Name: <?php echo $proname ?></h3>
                  <br>
                  <h3 class="proid">Subject Code: <?php echo 'IT'.(2200+$proid) ?></h3>
                  <div class="col-md-12">
                      <hr>
                  </div>
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> ID </th>
                                <th> Student Name </th>
                                <th>GPA</th>
                                <th> EDIT </th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        if($query_run)
                        {
                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>
                                    <tr>
                                        <th> <?php echo $row['id']; ?> </th>
                                        <th> <?php echo $row['student_name']; ?> </th>
                                        <th> <?php echo $row['sub'.$proid.'_gpa']; ?> </th>
                                        <th>
                                            <form action="updatedata.php" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                                <input type="submit" name="edit" class="btn btn-success" value="EDIT">
                                            </form>
                                        </th>

                                    </tr>

                                <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <tr>
                                        <th colspan="6"> No Record Found </th>
                                    </th>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-success" style=" margin-top: 5%;margin-left: 80%;"> Logout </a>
                </div>
            </div>

        </div>
    </div>
</body>
</html> -->
