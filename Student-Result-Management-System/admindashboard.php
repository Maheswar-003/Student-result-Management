<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'studentdb';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Admin Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        /* ul {
            list-style-type: none;
        } */

        @media (min-width: 600px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body>

    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">
                    <h1><b>Admin Page</b></h1>
                </span>
            </a>

            <div class="form-inline my-2 my-lg-0" style="text-align: right;">
                <button class="btn btn-outline-danger my-2 my-sm-0" href="logout.php" role="button" style="position: absolute; right: 20%; margin-bottom: 20px;">Logout</button>
            </div>
        </header>

        <main>
            
            <div class="row g-5">
                <div class="col-md-6">
                    <a class="btn btn-dark" href="table_teacher.php" role="button">Details of Teachers</a>
                    <br>
                    <br>
                    <a class="btn btn-dark" href="register_teacher.php" role="button">
                        <h3>Add Teacher</h3>
                    </a>
                    <br><br>
        
                </div>

                <div class="col-md-6">
                    <a class="btn btn-dark" href="table_student.php" role="button">Details of Students</a>
                    <br>
                    <br>
                    <a class="btn btn-dark" href="register_student.php" role="button">
                        <h3>Add Student</h3>
                    </a>
                    <br><br>
                </div>
            </div>
        </main>
        <footer class="pt-5 my-5 text-muted border-top">
            <!-- Created by S &middot; &copy; 2022 -->
        </footer>
    </div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>

</html>

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
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                  <img src="admindash.png" alt="admin photo">
                    <h2> Dashboard</h2>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-success" style="margin-left: 80%;"> Logout </a>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
								<div>
									<form action="adminfacdashboard.php">
										<button class="btn btn-success btn1"type="submit" name="Faculty">Faculty</button>
									</form>
								</div>
								<div>
									<form action="adminstddashboard.php" method="post">
										<button class="btn btn-success btn2" type="submit" name="Student">Student</button>
									</form>
								</div>


            </div>


</body>
</html> -->
