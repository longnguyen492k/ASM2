<?php
require_once "header.php";

$id = $_POST['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $sql = "UPDATE class SET class_name = '$name', class_quantity = '$quantity' WHERE class_id ='$id'";
    $run = query($sql);
    echo $run;
    if ($run) { ?>
        <script>
            alert ("Update class succeed !");
            window.location.href = "view_class.php";
        </script>
    <?php } else { ?>
        <script>
            alert ("Update class failed !");
            window.location.href = "";
        </script>
<?php } } else { 
    $sql1 = "SELECT * FROM class WHERE class_id = '$id'";
    $run1 = query($sql1);
    $class = mysqli_fetch_array($run1);
    ?>
<form action="" method="post">
    <fieldset>
        <legend>UPDATE CLASS</legend>
        Class Name: <input type="text" name="name" id=""  
        minlength="3" maxlength="10" value="<?= $class[1] ?>" required>
        <br><br>
        Max Quantity: <input type="number" name="quantity" id=""
        min="10" max="30" value="<?= $class[2] ?>" required>
        <br><br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="UPDATE" name="update">
    </fieldset>
</form>
<?php } ?>