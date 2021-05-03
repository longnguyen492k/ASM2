<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){ ?>
    <script>
        alert("You are not allowed to access this page. You must login first !");
        window.location.href = "login.php";
    </script>
<?php } ?>
