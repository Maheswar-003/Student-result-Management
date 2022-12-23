<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Student Login</title>
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
     <h2>Student Login</h2>
     <hr>
     <form method="post" action="studentloginvalidation.php">
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
