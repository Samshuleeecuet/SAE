<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
session_start();
header('location:login.php');

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
    echo"You are Already Sign Up"; 
} else {
    $stmt = $conn->prepare("insert into user(First_Name,Last_Name,Nick_Name,Phone,Email,Password) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss", $fname, $lname, $nname, $phn, $email, $pass);
    $execval = $stmt->execute();
    echo $execval;
    echo "Sign Up successfully...";
    $stmt->close();
    $conn->close();
}
?>