<?php

if(isset($_POST['search']))
{
    $search = $_POST['search'];
    $sql = "SELECT * FROM `multiusercontrol`.`userteachersubject` WHERE CONCAT(`name`,`email`) LIKE '%".$search."%'";
    $result = filterTable($sql);
    
}
 else {
    $sql ="SELECT * FROM `multiusercontrol`.`userteachersubject`";
    $result = filterTable($sql);
}

function filterTable($sql)
{
    $connect = mysqli_connect("localhost", "root", "", "multiusercontrol");
    $filter_Result = mysqli_query($connect, $sql);
    return $filter_Result;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table with DataBase</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        table{
            border:2px solid black;
            border-collapse:collapse;
            width:100%;
            font-family: 'Ubuntu', sans-serif;
            font-size: 25px;
            text-align:left;
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
</head>
<body>
<form action="table_teacher.php" method="post">
        <div class="search">
            <div class="col-md-4" style="margin-left: auto; margin-right: 0;">
                
                    <div class="input-group mb-3">
                        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search data" >
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                
            </div>
        </div>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>PG Subject</th>
        <th>UG Subject 1</th>
        <th>UG Subject 2</th>
    </tr> 

    <?php

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>". $row['SNo']. "</td><td>". $row['name']."</td><td>". $row['email']."</td><td>". $row['pgSubject']. "</td><td>". $row['ugSubject1']. "</td><td>". $row['ugSubject2']. "</td><td><a class='button' href='delete2.php?SNo=$row[SNo]'>Delete</td></tr>";
        }
        echo "</table>";

        $num = mysqli_num_rows($result);
        echo"<h3>". $num;
        echo " records found in the DataBase</h3><br>";  
    ?>

</table>   
</body>
</html>