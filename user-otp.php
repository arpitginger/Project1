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
<form action="user-otp.php" method="POST" autocomplete="off">
	<div class="row">
		<h1>Code Verification</h1>
		<h6 class="information-text">Enter code to reset your password.</h6>
		<div class="form-group">
			<input type="number" name="otp" id="otp" placeholder="Enter Code here">
			<button name="check">Verify</button>
		</div>
	</div>
</form>
</body>
</body>
</html>