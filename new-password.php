<?php
require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgot.css">
    <title>Create new password</title>
    <script src="js/validate.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php
                    if (isset($_SESSION['info'])) {
                    ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Create new password" required>

                        <input class="form-control" type="password" id="password2" name="cpassword" placeholder="Confirm your password" required>

                        <input class="form-control button" type="submit" name="change-password" value="Change" onclick="registration()">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function registration() {
            var pwd = document.getElementById("password").value;
            var cpwd = document.getElementById("password2").value;

            var cap = /^(?=.*?[A-Z])/;
            var small = /^(?=.*?[a-z])/;
            var num = /(?=.*?[0-9])/;
            var spcl = /(?=.*?[#?!@$%^&*-])/;

            if (pwd == "") {
                alert("Please enter Password");
            } else if (!cap.test(pwd)) {
                alert("1 Upper case is required in Password field");
            } else if (!small.test(pwd)) {
                alert("1 Lower case is required in Password field");
            } else if (!num.test(pwd)) {
                alert("1 Number is required in Password field");
            } else if (!spcl.test(pwd)) {
                alert("1 Special character is required in Password field");
            } else if (document.getElementById("password").value.length < 6 && document.getElementById("password").value.length > 12) {
                alert("Password  length must be  6 to 12");
            } else {
                if (cpwd == "") {
                    alert("Enter Confirm Password");
                } else if (cpwd != pwd) {
                    alert("Password not Matched");
                    location.reload();
                } else {
                    alert("Valid Password");
                }
            }
        }
    </script>

</body>

</html>