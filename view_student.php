<?php
require_once "header.php";
?>
<center class="container">
    <table class="table table-dark">

        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Student DOB</th>
            <th>Student Email</th>
            <th>Student Mobile</th>
            <th>Student Image</th>
            <th>Student Class</th>
            <th>Options</th>
        </tr>
        <?php
        $sql = "SELECT * FROM student";
        $run = query($sql);
        while ($student = mysqli_fetch_array($run)) {
            ?>
        <tr>
            <td><?= $student[0] ?> </td>
            <td><?= $student[1] ?> </td>
            <td><?= $student[2] ?> </td>
            <td><?= $student[3] ?> </td>
            <td><?= $student[4] ?> </td>
            <td> 
                <a href="student_detail.php?StudentID=<?= $student[0] ?>">
                    <img src="images\students\<?= $student[5] ?>" width="150" height="150">
                </a>
            </td>
            <!-- hiển thị class_name thay vì class_id -->
            <?php
                $sql1 = "SELECT class_name FROM class WHERE class_id = '$student[6]'";
                $run1 = query($sql1);
                $cls = mysqli_fetch_array($run1);
                ?>
            <td> <?= $cls[0] ?> </td>
            <td class="options"> 
                <form action="update_student.php" method="post">
                    <input type="hidden" name="id" value="<?= $student[0] ?>">
                    <input class="btn btn-info"type="submit" value="UPDATE">
                </form>
                <form action="delete_student.php" method="post" onsubmit="return confirm_delete()">
                    <input type="hidden" name="id" value="<?= $student[0] ?>">
                    <input class="btn btn-danger" type="submit" value="DELETE">
                </form>
            </td>
        </tr>
        <?php
        } ?>
    </table>
</center>
<script>
    function confirm_delete() {
        var del = confirm ("Do you want to delete this student ?");
        if (del) {
            return true;
        } else {
            return false;
        }
    }
</script>

