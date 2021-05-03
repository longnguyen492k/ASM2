<?php
require_once "functions.php";

$id = $_POST['id'];
$sql = "DELETE FROM user WHERE user_id = '$id'";
$run = query($sql);
if ($run) { ?>
 <script>
    alert ("Delete user succeed !");
    window.location.href = "view_user.php";
 </script>
<?php } else { ?>
    <script>
    alert ("Delete user failed !");
    window.location.href = "view_user.php";
 </script>
<?php } ?>