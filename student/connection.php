<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'multiusercontrol';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['email'])){
	exit('Please fill email and password fields!');
}
else if (!isset($_POST['password'])){
	exit('Please fill email and password fields!');
}

if ($stmt = $con->prepare('SELECT id, password FROM userstudent WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // $_POST['password'] = md5($password);
        $mypassword=$_POST['password'];
        $mypassword = md5($mypassword);
        if ($mypassword === $password){

            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            // $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id;
            header('Location:student_page.php');
         
        } 
        else {
            // Incorrect password
            echo "Incorrect Details";
        }
    } 
    else {
        // Incorrect username
        echo 'Incorrect info';
    }
    $stmt->close();
}
?>