<?php 
include "db.php";
echo 'hello';
global $conn ;
$username=Jeff;
$password=1234;
$email = 'jeff@gmail.com';
$insert="INSERT INTO users(username, password, email) VALUES ('{$username}','{$password}','{$email}' );";


?>