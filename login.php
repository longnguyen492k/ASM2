<?php
session_start();
require_once "db_connect.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass = md5($password);

    $sql = "SELECT * FROM user WHERE user_name = '$username' AND password = '$pass'";
    $run = $connection->query($sql);
    $check = mysqli_fetch_array($run);
    if (is_array($check)) {

        $_SESSION['username'] = $username;
        $_SESSION['password'] = $pass;
?>

        <script>
            alert("Login succeed !");
            window.location.href = "home.php";
        </script>
    <?php } else { ?>

        <script>
            alert("Login failed !");
            window.location.href = "";
        </script>
    <?php }
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body,
            html {
                height: 100%;
                margin: 0;
            }

            .bg {
                /* The image used */
                background-image: url("https://i.pinimg.com/originals/42/e0/13/42e013955ddde521a8c505a5d0e9b2b6.png");

                /* Full height */
                height: 100%;

                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body class="bg">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form action="" method="post" style="margin-top: 250px;">
                                <h1 class="text-center text-info">Login</h1>
                                <div class="form-group">
                                    <label for="username" class="text-info">Username:</label><br>
                                    <input type="text" class="form-control" name="username" placeholder="Enter username here" id="" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="password" class="form-control" name="password" id="" placeholder="Enter password here" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info btn-md" value="Login" name="login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>