<?php
require_once "functions.php";

$id = $_POST['id']; //lấy "class_id" từ file "view_class.php"
//Bước 1: kiểm tra xem lớp học có tồn tại sinh viên nào hay không
$sql1 = "SELECT * FROM STUDENT WHERE student_class = '$id'";
$run1 = query($sql1);
if ($run1->num_rows >= 1) {  //lớp học đang tồn tại tối thiểu 1 sinh viên => không cho xóa
?>
    <script>
        alert ("This class can not be deleted !");
        window.location.href = "view_class.php";
    </script>    
<?php } else {
    //Bước 2: xóa lớp học nếu lớp học này không có sinh viên
    $sql = "DELETE FROM class WHERE class_id = '$id'";
    $run = query($sql);
    if ($run) { ?>
    <script>
        alert ("Delete class succeed !");
        window.location.href = "view_class.php";
    </script>
<?php } else { ?>
    <script>
        alert ("Delete class failed !");
        window.location.href = "view_class.php";
    </script>
<?php }
}?>