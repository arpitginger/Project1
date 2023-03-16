<?php
require_once "controllerUserData.php";
require_once "config.php";
?>
<?php
//  session_start();
// if($_SESSION['info'] == false){
//     header('Location: login.php');  
// }
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
                <h2 class="title">Log in with</h2>
                <div class="social-login">
                    <ul>
                        <li class="google"><a href="#">Google</a></li>
                        <li class="fb">
                            <!--<a href="#">Facebook</a>-->
                            <?php
                            //If no $accessToken is set then user should log in first
                            if (isset($accessToken)) {
                                if (isset($_SESSION['facebook_access_token'])) {
                                    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
                                } else {
                                    // Put short-lived access token in session
                                    $_SESSION['facebook_access_token'] = (string) $accessToken;

                                    // The OAuth 2.0 client handler helps us manage access tokens
                                    $oAuth2Client = $fb->getOAuth2Client();

                                    if (!$accessToken->isLongLived()) {
                                        //Exchanges a short-lived access token for a long-lived one
                                        try {
                                            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
                                            $_SESSION['facebook_access_token'] = (string) $accessToken;
                                        } catch (Facebook\Exceptions\FacebookSDKException $e) {
                                            echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                                            exit;
                                        }
                                    }
                                }

                                // Redirect the user back to the same page if url has "code" parameter in query string
                                if (isset($_GET['code'])) {
                                    header('Location: ./');
                                }

                                // Getting user facebook profile info
                                try {
                                    $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
                                    $fbUserData = $profileRequest->getGraphNode()->asArray();

                                    //Ceate an instance of the OauthUser class
                                    $oauth_user_obj = new OauthUser();
                                    $userData = $oauth_user_obj->verifyUser($fbUserData);
                                } catch (FacebookResponseException $e) {
                                    echo 'Graph returned an error: ' . $e->getMessage();
                                    session_destroy();
                                    // Redirect user back to app login page
                                    header("Location: ./");
                                    exit;
                                } catch (FacebookSDKException $e) {
                                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                                    session_destroy();
                                    // Redirect user back to app login page
                                    header("Location: ./");
                                    exit;
                                }


                                // Get logout url
                                //$logoutURL = $helper->getLogoutUrl($accessToken, 'http://localhost/mit-demos/facebook-login/logout.php');



                            } else {
                                // Get login url
                                $loginUrl = $helper->getLoginUrl($redirectUrl);
                                echo '<a href="' . htmlspecialchars($loginUrl) . '"><img class="login_image" src="data:image/jpeg;base64,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" width="50"></a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>

                <div class="_or">or </div>
                <div>
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
                        <div class="alert alert-danger" style="color:red;">
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
                </div>


                <form class="the-form" name="form" id="form" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                    <div>
                        <label for="keepLogin" style="width: 50%;">Keep me login:</label>
                        <input type="checkbox" value="1" id="check" name="remember" style="width: 50%;" required>
                    </div>
                    <input type="submit" name="login" value="Login" id="button">
                    <center><a href="forgot.php">Forgot Password? Click Here</a></center>
                </form>
            </div>
        </div>

        <div class="form-footer">
            <div>
                <span>Don't have an account?</span>
                <a href="signup.php">Sign Up</a>
            </div>
        </div>

    </div>
</body>

</html>
