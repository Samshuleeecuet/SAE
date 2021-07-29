<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
session_start();


$conn = new mysqli('localhost', 'root', '','sae');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$nname = $_POST['nname'];
$phn = $_POST['phn'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$q = " select * from user where email = '$email' ";
$result = mysqli_query($conn,$q);
$num = mysqli_num_rows($result); 

if($num == 1){
    
    $_SESSION['email'] = $email;
    header('location:index.html')
} else {
    
    header('location:login.php')
    
}
?>