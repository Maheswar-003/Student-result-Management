<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<style>
        body{
            margin-top:30px;
            margin-left:30px;
        }
        table{
            border:2px solid black;
            border-collapse:collapse;
            width:90%;
            font-family: 'Ubuntu', sans-serif;
            font-size: 25px;
            text-align:left;
            margin-left:15px;
        }
        th{
            background-color: lightblue;
            border:2px solid black;
        }
        td{
            border:2px solid black;
        }
        tr:nth-child(odd){
            background-color: lightblue;
        }
        .button{
            position: relative;
            left:0px;
            background-color:red;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius:15px;
        }
        .search{
            margin-top: 20px;
        }
    </style>
<body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multiusercontrol";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$subject1 = $_GET['ugSubject1'];

if($subject1 == "Design and Analysis of Algorithm Lab"){
    $sql = "SELECT * FROM `multiusercontrol`.`userstudent` WHERE branch='Computer Scinece and Technology(CST)' AND section='2020-2024'";
}
else{
    $sql = "SELECT * FROM `multiusercontrol`.`userstudent` WHERE branch='Computer Scinece and Technology(CST)' ";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
        <table>
            <tr>
                <th>Name</th>
                <th>Program</th>
                <th>Section</th>
                <th>Enrollment No</th>
                <th>Subject</th>
                <th>Enter Marks</th>
            </tr> 

            <?php

            while($row = $result->fetch_assoc()){
            ?>
                    <!-- echo "<tr><td>". $row['name']."</td><td>". $row['program']. "</td><td>". $row['section']. "</td><td>". $row['enrollment']."</td><td>".$subject1."</td><td><a class='button' href='update1.php?id=$row[id]'>Update"."</td></tr>"; -->
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['program'] ?></td>
                    <td><?php echo $row['section'] ?></td>
                    <td><?php echo $row['enrollment'] ?></td>
                    <td><?php echo $subject1 ?></td>
                   <td> 
                        <div class="col-md-9" style="margin-left: auto; margin-right: auto;">
                        <div class="input-group">
                            <input type="text" name="marks" class="form-control" required>
                            <span class="input-group-text">/50</span>
                            <a <?php echo "class='btn btn-primary' href='submit_result.php?enrollment=$row[enrollment]&ugSubject1=$subject1&marks=$_GET[marks]' role='button'" ?>>Enter</a>
                           
                        </div>
                        </div>
                       
                    </td>
                </tr>

            <?php
                }

                echo "</table>";

                $num = mysqli_num_rows($result);
                echo"<h3>&nbsp;&nbsp;Total ". $num;
                echo " records found in the DataBase</h3><br>";  
            ?>

        </table> 
<?php
} else {
  echo "0 results";
}

$conn->close();
?>

</body>
</html>