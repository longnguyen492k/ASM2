<?php
require_once "header.php";

//1) tạo sql query
$sql = "SELECT * FROM class";
//2) thực thi sql query
$run = query($sql);
// //3) hiển thị kết quả sử dụng vòng lặp while
// while ($row = mysqli_fetch_array($run)) {
//     echo "Class ID: " . $row[0] . "<br>"; //index: 0, cột: 1 (từ trái sang)
//     echo "Class Name: " . $row[1] . "<br>"; //cột 2
//     echo "Class Quantity: " .$row['class_quantity'] . "<br>"; //tên cột ở trong bảng
// }
?>
<center class="container">
    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Max Quantity</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($class = mysqli_fetch_array($run)) {
            ?>
                <tr>
                    <td><?= $class[0] ?></td>
                    <td><?= $class[1] ?></td>
                    <td><?= $class[2] ?></td>
                    <td class="options">
                        <form class="inline" action="update_class.php" method="post">
                            <input type="hidden" name="id" value="<?= $class[0] ?>">
                            <input class="btn btn-primary" type="submit" value="UPDATE">
                        </form>
                        <form class="inline" action="delete_class.php" method="post" onsubmit="return confirm_delete()">
                            <input type="hidden" name="id" value="<?= $class[0] ?>">
                            <input class="btn btn-danger" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</center>
<script>
    function confirm_delete() {
        var del = confirm("Do you want to delete this class ?");
        if (del) {
            return true;
        } else {
            return false;
        }
    }
</script>