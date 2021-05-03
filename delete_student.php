<?php
require_once "functions.php";
$id = $_POST['id']; //lấy student_id từ file view_student.php 
$sql = "DELETE FROM student WHERE student_id = '$id'";
$run = query($sql);
if ($run) { ?>
  <script>
        alert("Delete student succeed !");
        window.location.href = "view_student.php";
  </script>
<?php } else { ?>
    <script>
        alert("Delete student failed !");
        window.location.href = "view_student.php";
  </script>
<?php } ?>