<?php
require_once "header.php";

if (isset($_POST['add'])) {
    //Bước 0: lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    //Bước 1: check duplicate username (kiểm tra username nhập vào đã tồn tại trong DB hay chưa)
    $sql = "SELECT user_name FROM user WHERE user_name = '$username'";
    $run = query($sql);
    $check = mysqli_fetch_array($run);
    if (is_array($check)) { ?>
        <script>
            alert("Duplicated username. Input again !");
            window.location.href = "";
        </script>
        <?php } else {
        //Bước 2: check 2 password nhập vào có giống nhau không
        if ($password != $confirm) { ?>
            <script>
                alert("Passwords are not similar. Input again !");
                window.location.href = "";
            </script>
            <?php } else {
            //Bước 3: mã hóa mật khẩu
            $pass = encrypt($password);
            //Bước 4: insert dữ liệu vào database
            $sql1 = "INSERT INTO user (user_name, password) VALUES ('$username','$pass')";
            $run1 = $connection->query($sql1);
            if ($run1) { ?>
                <script>
                    alert("Add new user succeed !");
                    window.location.href = "view_user.php";
                </script>
            <?php } else { ?>
                <script>
                    alert("Add new user failed !");
                    window.location.href = "";
                </script>
    <?php }
        }
    }
} else {
    ?>
    <center>
        <form action="" method="post" >
            <div class="col-md-5" style="background-color: lightsteelblue;">
                <legend>Add User</legend>
                <input type="text" name="username" placeholder="Username" id="" required>
                <br><br>
                <input type="password" name="password" placeholder="Password" minlength="6" maxlength="20" required>
                <br><br>
                <input type="password" name="confirm" placeholder="Confirm password" minlength="6" maxlength="20" required>
                <br><br>
                <input class="btn btn-info" type="submit" value="ADD" name="add">
            </div>
        </form>
    </center>
<?php } ?>