<?php
require "connection.php";

session_start();
$con = new connection();

// //if user click login button
if (isset($_POST['validate'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $pass1 = md5($password);
    $check_username = "SELECT * FROM adminLogin WHERE username = '$username'";
    $res = $con->connect()->query($check_username);
    if ($res) {
        $fetch = $res->fetch();
        $fetch_pass = $fetch['password'];
        if ($pass1 ==  $fetch_pass) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $pass1;
            setcookie("login", "1", time() + 900);
            header('location: admin.php');
        } else {
            setcookie("login", "1");
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "Enter the correct credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="main-container">
        <div class="form-container">

            <div class="srouce"><a title="Login Page" href="index.php">Cars & More</a></div>
            <div class="form-body">
                <h2 class="title">Admin Login</h2>
                <?php
                if (count($errors) == 1) {
                ?>
                    <div class="alert alert-danger text-center" style="color: red;">
                        <center>
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </center>
                    </div>
                <?php
                } elseif (count($errors) > 1) {
                ?>
                    <div class="alert alert-danger" style="color:black;">
                        <center>
                            <?php
                            foreach ($errors as $showerror) {
                            ?>
                                <li><?php echo $showerror; ?></li>
                            <?php
                            }
                            ?>
                        </center>
                    </div>
                <?php
                }
                ?>
                <form class="the-form" name="form" id="form" method="post">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter your email">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                    <!-- <label for="password">Verification Code</label>
                    <input type="text" name="code" id="code" placeholder="Enter code here" > -->
                    <input type="submit" name="validate" value="Login" id="button">
            </div>
        </div>
    </div>

</body>

</html>