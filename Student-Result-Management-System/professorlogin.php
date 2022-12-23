<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Faculty Login</title>
  <link href="style5.css" rel="stylesheet" type="text/css" />
  <style>
    body{
      width:100vw;
      height:100vh;
      margin:0;
  
    }
  </style>
 </head>
 <body>
   <div class="log-page">
   <div class="log-details">
     <h2>Faculty Login</h2>
     <hr>
     <form method="post" action="professorloginvalidation.php">
       <p><strong>User Name:</strong></p>
       <input type="text" name="name" placeholder="Enter Username" required="required">
       <p><strong>Password:</strong></p>
       <input type="password" name="password" placeholder="Enter Password" required="required"><br>
       <br>
       <button type="submit" name="button">Login</button>
     </form>
     <br>
     <a href="index.php" class="back">Back</a>
   </div>
     </div>
 </body>
</html>


<?php
// session_start();
// $connection = mysqli_connect("localhost","root","");
// $db = mysqli_select_db($connection,"studentdb");

// $query="INSERT INTO markscst (name) SELECT name FROM userstudent WHERE branch='CST'";
// $query_run = mysqli_query($connection,$query);
// $query="INSERT INTO marksit (name) SELECT name FROM userstudent WHERE branch='IT'";
// $query_run = mysqli_query($connection,$query);
// $query="INSERT INTO marksetc (name) SELECT name FROM userstudent WHERE branch='ETC'";
// $query_run = mysqli_query($connection,$query);

?> 