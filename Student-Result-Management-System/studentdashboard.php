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
    <title>Student Page</title>
    <link rel="stylesheet" href="student_page.css">
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
                <a class="navbar-brand" href="student_page.php">Student Page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav me-2">
                    </ul>
                </div>
                <form action="logout.php" method="post" class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </section>

    <section id="content">

    <?php
        $query = "select * from userstudent where id = '$_SESSION[id]'";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)) 
        {
	?>

    <div class="container-fluid row student-body">
            <div class="card left">
                
                <div class="student-title">
                    <i class="fas fa-user student-img"></i>
                    <h5 class="card-title student-name"><?php echo $row['name']?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                    <p><i class="fas fa-phone"></i> <?php echo $row['phone']?> </p>
                    <p><i class="fas fa-envelope"></i>  <?php echo $row['email']?> </p>

                    </p>
                </div>
            </div>
            <div class="card right">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Information</h3>
                    <p class="card-text">
                    <p><b>Branch: </b> <?php echo $row['branch']?></p>

                    </p>
                </div>
            </div>
        </div>
    <?php
        }	
    ?>
    </section>

    <font size="10"><b> RESULT </b></font>
    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> SUBJECT 1</th>
                                <th> SUBJECT 2</th>
                                <th> SUBJECT 3</th>
                            </tr>
                        </thead>
    <tbody>
                            
<?php

$query="SELECT branch FROM userstudent where name='$_SESSION[name]'";

$result = mysqli_query($connection,$query);
if (mysqli_num_rows($result) > 0) {
    while($rowData = mysqli_fetch_array($result)){
        if($rowData["branch"] =='CST'){
            $query = "SELECT * FROM markscst where name='$_SESSION[name]'";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run)){

                    echo "<tr>";

                    echo "<td>" . $row['sub1'] . "</td>";

                    echo "<td>" . $row['sub2'] . "</td>";

                    echo "<td>" . $row['sub3'] . "</td>";

                    echo "</tr>";

                    }
            }
            else if($rowData["branch"] =='IT'){
                $query = "SELECT * FROM marksit where name='$_SESSION[name]'";
                $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                while($row = mysqli_fetch_array($query_run))
                {   
                    
                    echo "<tr>";

                    echo "<td>" . $row['sub4'] . "</td>";

                    echo "<td>" . $row['sub5'] . "</td>";

                    echo "<td>" . $row['sub6'] . "</td>";

                    echo "</tr>";
                }
                }
            }
            else if($rowData["branch"] =='ETC'){
                    $query = "SELECT * FROM marksetc where name='$_SESSION[name]'";
                    $query_run = mysqli_query($connection, $query);
                    if($query_run)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {   
                       
                    echo "<tr>";

                    echo "<td>" . $row['sub7'] . "</td>";

                    echo "<td>" . $row['sub8'] . "</td>";

                    echo "<td>" . $row['sub9'] . "</td>";

                    echo "</tr>";

                    }
                } 
            }
	}
}
}
?>

        </tbody>
     </table>


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
    <title>Student Dashboard</title>
		<style type="text/css">
		th{
			text-align: center;
		}
		</style>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <h2>Dashboard</h2>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <?php
                // $connection = mysqli_connect("localhost","root","");
                // $db = mysqli_select_db($connection, 'srms');


                // $query = "SELECT * FROM studentwisemarks where id='$_SESSION[id]'";
                // $query_run = mysqli_query($connection, $query);
				// 				$proname = $_SESSION['username'];               // something like this is optional, of course
                // $proid = substr($proname,7);

            ?>

            <div class="row">
                <div class="col-md-12">
									<h3>Name: <?php echo $proname ?></h3>
                  <br>
                  <h3 class="proid">Enrollement ID: <?php echo '2020ITB'.(100+$proid) ?></h3>
                  <div class="col-md-12">
                      <hr>
                  </div>
                    <table class="table table-bordered" style="background-color: white;">
                        <thead class="table-dark">
                            <tr>
                                <th> Subject Name</th>
                                <th> GPA</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php

                        // if($query_run)
                        // {
                        //     while($row = mysqli_fetch_array($query_run))
                        //     {
                        //         ?>
                        //             <tr>
						// 														<th>Subject1</th>
                        <!-- //                 <th> <?php echo $row['sub1_gpa']; ?> </th>
						// 												</tr>
						// 												<tr>
						// 															<th>Subject2</th>
	                    //                     <th> <?php echo $row['sub2_gpa']; ?> </th>
						// 												</tr>
						// 												<tr>
						// 													<th>Subject3</th>
						// 													<th> <?php echo $row['sub3_gpa']; ?> </th>
						// 												</tr>

						// 												<tr>
						// 														<th>Total CGPA</th>
                        //                 <th> <?php echo ($row['sub1_gpa']+$row['sub2_gpa']+$row['sub3_gpa'])/3; ?> </th>
                        //             </tr> -->

                        //         <?php
                        //         }
                        //     }
                        //     else
                        //     {
                            //     ?>
                            //         <tr>
                            <!-- //             <th colspan="6"> No Record Found </th> -->
                            //         </th>
                            //     <?php
                            // }
                        // ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-success" style="margin-left: 80%;"> Logout </a>
                </div>
            </div>

        </div>
    </div>
</body>
</html> -->
