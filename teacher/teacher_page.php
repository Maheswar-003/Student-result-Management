<?php
session_start();
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"multiusercontrol");
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
                            <a class="nav-link" href="teacher_notification.php">Notifictation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teacher_teaching.php">Teaching</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="teacher_student.php">Student</a>
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
        $query = "select * from userteacher where email = '$_SESSION[email]'";
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
                    <p><b><?php echo $row['position']?></b></p>
                    <p><b><?php echo $row['department']?></b></p>
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
                    <p><b>ID: </b><?php echo $row['id']?></p>
                    <p><b>Position: </b><?php echo $row['position']?></p>
                    <p><b>Experience: </b><?php echo $row['experience']?></p>

                    </p>
                </div>
            </div>
        </div>
    <?php
        }	
    ?>
    </section>

</body>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</html> -->


<!-- INSERT INTO `userteacher` (`Slno`, `name`, `department`, `id`, `position`, `experience`, `phone`, `email`, `password`, `date`) VALUES ('1', 'Somnath Sen', 'Computer Scinece and Technology(CST)', 'CST06IIEST', 'Associate Professor', '5', '9999999998', 'somnath@gmail.com', '12345', current_timestamp()); -->