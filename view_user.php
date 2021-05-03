<?php
require_once "header.php";
?>
<center class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Options</th>
      </tr>
      <?php
      $sql = "SELECT * FROM user";
      $execute = query($sql);
      while ($user = mysqli_fetch_array($execute)) {
      ?>
        <tr>
          <td><?= $user[0] ?></td>
          <td><?= $user[1] ?></td>
          <td><?= $user[2] ?></td>
          <td class="options">
            <form class="inline" action="update_pass.php" method="post">
              <input type="hidden" name="id" value="<?= $user[0] ?>">
              <input class="btn btn-info" type="submit" value="UPDATE" name="update">
            </form>
            <form class="inline" action="delete_user.php" method="post" onsubmit="return confirm_delete()">
              <input type="hidden" name="id" value="<?= $user[0] ?>">
              <input class="btn btn-danger" type="submit" value="DELETE" name="delete">
            </form>
          </td>
        </tr>
      <?php
      }
      ?>
  </table>
</center>
<script>
  // tạo hàm để cho người dùng xác nhận có muốn xóa 1 record cụ thể hay không
  function confirm_delete() {
    var del = confirm("Are you sure to delete this user ?");
    if (del) {
      return true;
    } else {
      return false;
    }
  }
</script>