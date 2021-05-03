<?php
session_start(); //khởi tạo session
require_once "db_connect.php";
//check xem form login đã hiển thị và người dùng đã đăng nhập hay chưa
if (isset($_POST['login'])) {
//tạo biến để lưu dữ liệu người dùng nhập vào từ form
$username = $_POST['username'];
$password = $_POST['password'];  //pass chưa mã hóa
$pass = md5($password);          //pass đã mã hóa bằng "md5"
// echo "Username: $username <br>";
// echo "Password: $password <br>";
//tạo sql query để truy vấn dữ liệu từ database
$sql = "SELECT * FROM user WHERE user_name = '$username' AND password = '$pass'";
$run = $connection->query($sql);
$check = mysqli_fetch_array($run);
if (is_array($check)) { 
    //tạo 2 biến session tương ứng với thông tin login
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $pass; 
    ?>
    <!-- echo "Login succeed !"; -->
    <script>
        alert("Login succeed !");  //hiển thị thông báo kiểu pop-up
        window.location.href = "home.php";  //re-direct đến địa chỉ mong muốn
    </script>
 <?php } else { ?>
    <!-- echo "Login failed !"; -->
    <script>
        alert("Login failed !");  //hiển thị thông báo kiểu pop-up
        window.location.href = "";  //href: rỗng => reload lại trang hiện tại
    </script>
<?php } 
} 
else {
//nếu form chưa hiển thị hoặc người dùng chưa đăng nhập thì hiển thị form trước và xử lý sau
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style_admin.css">
</head>
<body>
<center>
    <form action="" method="post">
        <!-- action: rỗng => gửi & nhận thông tin trong cùng 1 file 
        post: bảo mật => thông tin nhập vào form không hiển thị lên URL -->
        <fieldset>
            <legend>Login</legend>
            <!--name: cực kỳ quan trọng, dùng để lưu giá trị của nhập vào từ form để xử lý
            -->
            <input type="text" name="username" placeholder="Enter username here" id="" required>
            <br> <br>
            <input type="password" name="password" id="" placeholder="Enter password here" required>
            <br> <br>
            <input type="submit" value="Login" name="login">
        </fieldset>
    </form>
</center>++
</body>
</html>
<?php
} 
?>