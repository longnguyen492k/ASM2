<?php
//khai báo tham số kết nối đến database
$host_name = "localhost"; //localhost: máy chủ nội bộ
$sql_username = "root"; //tài khoản để login vào phpMyAdmin
$sql_password = "root"; //Mamp: "root"  - Xampp: " " (empty)
$db_name = "gch0903ver2"; //tên database cần kết nối
$db_port = "3306"; //3306: default SQL port
//tạo kết nối đến database
$connection = new mysqli($host_name,$sql_username,$sql_password,$db_name,$db_port);
//check xem đã kết nối đến DB thành công chưa
if ($connection->connect_error) {
    // echo "Connect to DB failed !";
    die($connection->connect_error);
} else {
    echo "Connect to DB succeed !";
}
?>