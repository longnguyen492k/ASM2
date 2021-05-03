<?php
require_once "functions.php";
$sql = "SELECT * FROM class";
$run = query($sql);
?>
<ul>
    <?php
    while ($cls = mysqli_fetch_array($run)) { ?>
    <li>
        <!-- tạo đường link để gửi class_id bằng URL sử dụng phương pháp GET  -->
        <a href="class_detail.php?ClassID=<?= $cls['class_id'] ?>">
            <?= $cls['class_name'] ?> 
        </a>
    </li>
    <?php } ?>
</ul>
