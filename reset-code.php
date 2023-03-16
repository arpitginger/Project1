<?php
require_once "controllerUserData.php";
?>
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
</head>

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Code Verification</title>
    </head>

    <body>
        <form action="reset-code.php" method="POST" autocomplete="off">
            <div class="row">
                <h1>Code Verification</h1>
                <?php
                if (isset($_SESSION['info'])) {
                ?>
                    <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
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
                <div class="form-group">
                    <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                </div>
            </div>
            </div>
        </form>
    </body>
</body>

</html>