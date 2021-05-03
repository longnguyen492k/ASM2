<?php
require_once "functions.php";
$id = $_GET['StudentID'];
$sql = "SELECT * FROM student WHERE student_id = '$id'";
$run = query($sql);
$std = mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            border-radius: 20%;
            margin-top: 50px;
        }
        td {
            padding: 20px;
            color:limegreen;
        }
        body {
            background-color: mistyrose;
        }
    </style>
</head>
<body>
<center>
    <table>
        <tr>
            <td>
                <img src="images\students\<?= $std['student_image'] ?>" 
                alt="" width="350" height="350"> 
            </td>
            <td>
                <h1>Name: <?= $std['student_name'] ?> </h1> 
                <h1>Mobile: <?= $std['student_mobile'] ?> </h1>  
                <h1>Email: <?= $std['student_email'] ?> </h1> 
            </td>
        </tr>
    </table>
</center>
</body>
</html>

