<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/validate.js"></script>
</head>

<body>
    <div class="main-container">
        <div class="form-container">

            <div class="srouce"><a title="Login Page" href="index.php">Cars & More</a></div>

            <div class="form-body">
                <h2 class="title">Register Here</h2>
                        <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center" style="color: red;">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger" style="color:red;">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>

                <form name="form" class="the-form" id="form" method="post"  action="signup.php">

                    <label for="username"> User Name</label>
                    <input type="text" name="username" id="username" placeholder="Enter your Name" required autofocus>
                    <!-- <div class="error"></div> -->

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="example@domain.com" required>
                    <!-- <div class="error"></div> -->

                    <label for="phone">Phone Number</label>
                    <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number" required>
                    <!-- <div class="error"></div> -->

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Example@12" required>
                    <!-- <div class="error"></div> -->

                    <label for="confirm">Confirm Password</label>
                    <input type="password" name="confirm" id="password2" placeholder="Enter your password again" required>
                    <!-- <div class="error"></div> -->

                    <label>
                        <input type="checkbox" name="terms" id="check" required>By signing up to this you agree to your
                        <a href="#service">Terms of Service</a> and <a href="#policy">Privacy Policy.</a>
                    </label>

                    <input type="submit" value="submit" id="button" name="submit" class="btn" onclick="registration()" />
                </form>

            </div>
        </div>
    </div>
</body>

</html>