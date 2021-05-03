<?php
require_once "header.php";
$id = $_POST['id'];
if (isset($_POST['update'])) {
    $new = $_POST['new'];
    $retype = $_POST['retype'];
    //check xem user có nhập 2 password mới trùng nhau không
    if ($new != $retype) { ?>
        <script>
            alert("New passwords are not similar. Input again !");
            window.location.href = "";
        </script>
    <?php } else {
        $pass = encrypt($new);
        $sql = "UPDATE user SET password = '$pass' WHERE user_id = '$id'";
        $run = query($sql);
            if ($run) { ?>
                <script>
                    alert("Update password succeed !");
                    window.location.href = "view_user.php";
                </script>
            <?php } else { ?>
                <script>
                    alert("Update password failed !");
                    window.location.href = "";
                </script>
        <?php } 
            }
} else {
?>
<center>
    <form action="" method="post">
        <input type="password" name="new" id="" placeholder="New password" required><br>
        <input type="password" name="retype" id="" placeholder="Retype password" required><br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="UPDATE" name="update">
    </form>
</center>
<?php
}
?>