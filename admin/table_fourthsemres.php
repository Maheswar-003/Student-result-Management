<?php

if(isset($_POST['search']))
{
    $search = $_POST['search'];
    $sql = "SELECT * FROM `multiusercontrol`.`fourthsemres` WHERE CONCAT(`name`,`enrollment`) LIKE '%".$search."%'";
    $result = filterTable($sql);
    
}
 else {
    $sql ="SELECT * FROM `multiusercontrol`.`fourthsemres`";
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
        body{
            margin-left:70px;
            margin-top:30px;
        }
        table{
            border:2px solid black;
            border-collapse:collapse;
            width:90%;
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
            background-color:blue;
            border: none;
            color: white;
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
    <h3>Fourth Semester Student Results</h3>
    <form action="table_fourthsemres.php" method="post">
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
                <th>Name</th>
                <th>Enrollment No</th>
                <th>Algo</th>
                <th>PP</th>
                <th>TOC</th>
                <th>AT1</th>
                <th>DS</th>
                <th>AlgoLab</th>
                <th>PPLab</th>
                <th>AT1Lab</th>
                <th>Project</th>
                <th>Result</th>
                <th>Email</th>
            </tr> 

            <?php

                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr><td>". $row['name']. "</td><td>". $row['enrollment']."</td><td>". $row['algo']. "</td><td>". $row['pp']. "</td><td>". $row['toc'].  "</td><td>". $row['at1']. "</td><td>". $row['ds']. "</td><td>". $row['algoLab']. "</td><td>". $row['ppLab']. "</td><td>". $row['at1Lab']."</td><td>". $row['project']."</td><td><a class='button' href='\project\admin\pdf\marksheet.php?enrollment=$row[enrollment]'>Print"."</td><td><a class='button' href='\project\admin\pdf\certificate.php?enrollment=$row[enrollment]'>Send</td></tr>";
                }
                echo "</table>";

                $num = mysqli_num_rows($result);
                echo"<h3>". $num;
                echo " records found in the DataBase</h3><br>";  
            ?>

        </table> 
    </form>  
</body>
</html>