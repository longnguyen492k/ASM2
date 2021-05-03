<?php
require_once "db_connect.php"; //kết nối database để thực hiện
                               //các thao tác CRUD
require_once "forbidden.php"; //cấm truy cập vào các trang quản lý
                              //của admin nếu không có tài khoản

//function để thực thi câu lệnh SQL
function query ($sql) {
    global $connection;
    return $connection->query($sql);
}                           

//function để mã hóa mật khẩu
function encrypt ($pass) {
    return md5($pass);
}
                              
                              
