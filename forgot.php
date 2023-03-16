<?php 
require_once "controllerUserData.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgot.css">
    <title>Forgot password</title>
</head>
<body>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password Page - HTML + CSS</title>
</head>
<body>
    
<form action="forgot.php" method="POST" autocomplete="">
	<div class="row">
		<h1>Forgot Password</h1>
		<h6 class="information-text">Enter your registered email to reset your password.</h6>
		   <?php
                    if(count($errors) == 1){
                        ?>
                         <div class="alert alert-danger text-center" style="color: red;">
                             <center>
                             <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                             ?>
                             </center>
                         </div>
                         <?php
                    }elseif(count($errors) > 1){
                         ?>
                         <div class="alert alert-danger" style="color:black;">
                             <center>
                             <?php
                             foreach($errors as $showerror){
                                 ?>
                                 <li><?php echo $showerror;?></li>
                                 <?php
                            }
                             ?>
                            </center>
                         </div>
                         <?php
                    }
                    ?>
		<div class="form-group">
			<input type="email" name="user_email" id="user_email">
			<p><label for="username">Email</label></p>
			<button name="check-email" >Reset Password</button>
		</div>
		<div class="footer">
			<h5>New here? <a href="signup.php">Sign Up.</a></h5>
			<h5>Already have an account? <a href="login.php">Sign In.</a></h5>
			<p class="information-text">
                <span class="symbols" title="Lots of love from me to YOU!">&hearts; </span><a href="index.php" target="_blank" title="Connect with me on Facebook">Cars N More</a></p>
		</div>
	</div>
</form>
</body>
</body>
</html>