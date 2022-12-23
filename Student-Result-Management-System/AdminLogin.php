<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Admin Login</title>
  <link href="style5.css" rel="stylesheet" type="text/css" />
  <script>src="script.js"</script>
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
     <h2>Admin Login</h2>
     <hr>
     <form method="post" action="adminloginvalidation.php">
      <p><strong>User Name:</strong></p>
       <input type="text" name="username" placeholder="Enter Username" id="username"required="required">
       <p><strong>Password:</strong></p>
       <input type="password" name="password" placeholder="Enter Password" id="password" required="required"><br>
       <br>
       <button type="submit" name="Login">Login</button>
     </form>
     <br>
     <a href="index.php" class="back">Back</a>
   </div>
     </div>
 </body>
</html>
