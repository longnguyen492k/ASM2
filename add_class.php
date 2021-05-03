<?php
require_once "header.php";

$id = $_POST['id'];
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $sql = "INSERT INTO class (class_name, class_quantity) VALUES ('$name','$quantity')";
    $run = query($sql);
    if ($run) { ?>
        <script>
            alert("Add class succeed !");
            window.location.href = "view_class.php";
        </script>
    <?php } else { ?>
        <script>
            alert("Add class failed !");
            window.location.href = "";
        </script>
    <?php }
} else { ?>
    <center class="container">
        <form action="" method="post" class="mt-4 col-md-8" style="background-color: lightblue;" >
            <div class="form-group col-md-6">
            <p class="font-weight-bold">Add new class</p>
                <input type="text" class="form-control" name="name" placeholder="Class Name" id="" minlength="3" maxlength="10" required>
                <br>
                <input type="number" class="form-control" name="quantity" placeholder="Max Quantity" id="" min="10" max="60" required>
                <input class="btn btn-info" type="submit" value="ADD" name="add">
            </div>
        </form>
    </center>
<?php } ?>