<?php
require_once "header.php";

$id = $_POST['id'];
if ($_POST['change']) {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $image = ""; //set giá trị ban đầu là rỗng để chạy code xử lý riêng
    $current_image = $_POST['current_image'];
    $class = $_POST['class'];
    
    //code để xử lý tên file ảnh và copy ảnh vào đúng thư mục chỉ định
    //B1: kiểm tra người dùng đã upload ảnh chưa và kích thước phải khác 0
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        //B2: tạo đường dẫn tạm thời để lưu ảnh
        $temp_name = $_FILES['image']['tmp_name'];
        //B3: tạo biến để lưu tên file ảnh
        $img_name = $_FILES['image']['name'];
        //B4: tách tên file ảnh thành 2 phần (tên & đuôi - định dạng)
        $parts = explode(".", $img_name);
        //B5: lấy ra đuôi (extension) của file ảnh
        $extension = end($parts);
        //B6: set tên mới cho ảnh theo format mong muốn
        $random = rand(1, 100);  //trả về giá trị random
        $image = $name . "_" . $class . "_" . $random . "." . $extension;
        //B7: thiết lập đường dẫn mới cho ảnh
        $path = "images/students/" . $image;
        //B8: copy file ảnh vào đường dẫn mới
        move_uploaded_file($temp_name, $path);
        $sql1 = "UPDATE student SET student_name = '$name', student_dob = '$dob',
                 student_email = '$email', student_image = '$image', student_class = '$class'
                 WHERE student_id = '$id'";
    } else { //nếu người dùng không upload ảnh mới thì vẫn giữ nguyên ảnh cũ
        $sql1 = "UPDATE student SET student_name = '$name', student_dob = '$dob',
                 student_email = '$email', student_image = '$current_image', student_class = '$class'
                 WHERE student_id = '$id'";
    }
    $run1 = query($sql1);
    if ($run1) { ?>
        <script>
            alert ("Update student succeed !");
            window.location.href = "view_student.php";
        </script>
<?php } else { ?>
        <script>
            alert ("Update student failed !");
            window.location.href = "";
        </script>
<?php } } else {
        $sql2 = "SELECT * FROM student WHERE student_id = '$id'";
        $run2 = query($sql2);
        $std = mysqli_fetch_array($run2);
    ?>
<center>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Update student</legend>
            Name: <input type="text" name="name" required minlength="10" maxlength="30" value="<?= $std[1] ?>">
            <br><br>
            DOB: <input type="date" name="dob" required value="<?= $std[2] ?>"> 
            <br><br>
            Email: <input type="email" name="email" value="<?= $std[3] ?>"> 
            <br><br>
            Mobile: <input type="tel" name="mobile" required value="<?= $std[4] ?>"> 
            <br><br>
            Image: 
            <img src="images\students\<?= $std[5] ?>" width="100" height="100"> <br>
            <input type="file" name="image" accept="image/*"> 
            <br><br>
            Class: 
            <select name="class">
                <?php
                $sql = "SELECT * FROM class";
                $run = query($sql);
                while ($cls = mysqli_fetch_array($run)) {
                    // hiển thị lớp học hiện tại của sinh viên lên đầu danh sách lựa chọn
                    if ($cls['class_id'] == $std['student_class']) { ?>
                        <option selected value="<?= $cls['class_id']?>">  
                            <?= $cls['class_name'] ?>
                        </option>
                        ?>
                   <!-- hiển thị class_name nhưng gửi đi value của class_id để insert vào DB -->
                   <?php
                    } else { ?> 
                        <option value="<?= $cls['class_id']?>"> 
                            <?= $cls['class_name'] ?>
                        </option>
                <?php }
                }?>
            </select>
            <br><br>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="current_image" value="<?= $std[5] ?>">
            <input type="submit" value="UPDATE" name="change">
        </fieldset>
    </form>
</center>
<?php } ?>  
 