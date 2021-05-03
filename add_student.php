<?php
require_once "header.php";
if ($_POST['add']) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $image = ""; //set giá trị ban đầu là rỗng để chạy code xử lý riêng
    $class = $_POST['class'];
    
    //code để xử lý tên file ảnh và copy ảnh vào đúng thư mục chỉ định
    //B1: kiểm tra người dùng đã upload ảnh chưa và kích thước phải khác 0
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        //B2: tạo đường dẫn tạm thời để lưu ảnh
        $temp_name = $_FILES['image']['tmp_name'];
        //B3: tạo biến để lưu tên file ảnh
        $img_name = $_FILES['image']['name'];
        //B4: tách tên file ảnh thành 2 phần (tên & đuôi - định dạng)
        $parts = explode(".",$img_name);
        //B5: lấy ra đuôi (extension) của file ảnh
        $extension = end($parts);
        //B6: set tên mới cho ảnh theo format mong muốn
        $random = rand(1,100);  //trả về giá trị random
        $image = $name . "_" . $class . "_" . $random . "." . $extension;
        //B7: thiết lập đường dẫn mới cho ảnh
        $path = "images/students/" . $image;
        //B8: copy file ảnh vào đường dẫn mới
        move_uploaded_file($temp_name,$path);
    }
    $sql1 = "INSERT INTO student (student_name, student_dob, student_email, student_mobile,
                        student_image, student_class) VALUES ('$name','$dob','$email',
                        '$mobile', '$image','$class')";
    $run1 = query($sql1);
    if ($run1) { ?>
        <script>
            alert ("Insert new student succeed !");
            window.location.href = "view_student.php";
        </script>
<?php } else { ?>
        <script>
            alert ("Insert new student failed !");
            window.location.href = "";
        </script>
<?php } } else { ?>
<center class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="col-md-8" style="background-color: lightsteelblue;">
            <legend>Add student</legend>
            Name: <input type="text" name="name" required minlength="10" maxlength="30"><br><br>
            DOB: <input type="date" name="dob" required> <br><br>
            Email: <input type="email" name="email"> <br><br>
            Mobile: <input type="tel" name="mobile" required> <br><br>
            Image: <input type="file" name="image" accept="image/*" required> <br><br>
            Class: 
            <select name="class">
                <?php
                $sql = "SELECT * FROM class";
                $run = query($sql);
                while ($cls = mysqli_fetch_array($run)) { ?>
                   <!-- hiển thị class_name nhưng gửi đi value của class_id để insert vào DB -->
                    <option value="<?= $cls['class_id']?>"> 
                        <?= $cls['class_name'] ?>
                    </option>
                <?php } ?>
            </select>
            <br><br>
            <input class="btn btn-success"type="submit" value="ADD" name="add">
        </div>
    </form>
</center>
<?php } ?>  
 