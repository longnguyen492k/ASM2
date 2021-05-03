<?php

$host_name = "localhost";
$sql_username = "root";
$sql_password = "root";
$db_name = "gch0903ver2";
$db_port = "3306"; 

$connection = new mysqli($host_name,$sql_username,$sql_password,$db_name,$db_port);

// if ($connection->connect_error) {
//     // echo "Connect to DB failed !";
//     die($connection->connect_error);
// } else {
//     echo "Connect to DB succeed !";
// }
?>