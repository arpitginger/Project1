<?php 
// if(!isset($_COOKIE["login"]))// $_COOKIE is a variable and login is a cookie name 
// 	header("location:login.php"); 
?>
<?php
 require_once "controllerUserData.php";
  ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = $con->connect()->query($sql);
    if($run_Sql){
        $fetch_info = $run_Sql->fetch();
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cars & More</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Project1.css">
    <link rel="icon" type="image/x-icon" href="images/logo2.png">
    <script src="js/project.js"></script>
</head>

<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                Cars & More
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div class="nav-links">
            <a href="#">Home</a> 
            <a href="services.php">Services</a>
            <a href="">Latest</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="header">
        <input type = "button1" value = "Push Right" onclick = "moveRight();" />
        <img id="image" src="images/logo2.png" >
        <input type = "button2" value = "Push Left" onclick = "stop();" />
        <marquee behavior="alternate" scrollamount="3">
            <marquee behavior="alternate" direction="down" scrollamount="5">
                <a onclick="this.style.visibility = 'hidden'">
                    <h1>Cars & More</h1>
                </a>
            </marquee>
        </marquee>

    </div>

    <div class="more" style="font-size:30px;margin-top: 10px;">
        <h2>Latest Models</h2>
    </div>

    <div class="row">
        <div class="column">
            <img id="img" src="images/car3.jpeg">
            <h2>Volkswagen</h2>
            <img id="img" src="images/car11.jpeg">
            <h2>Lamborgini</h2>
        </div>
        <div class="column">
            <img id="img" src="images/car8.jpg">
            <h2>Buggati Chiron</h2>
            <img id="img" src="images/car7.jpeg">
            <h2>Discovery</h2>

        </div>
        <div class="column">
            <img id="img" src="images/car1.jpeg">
            <h2>Scorpio</h2>
            <img id="img" src="images/car10.jpg">
            <h2>Mini Cooper</h2>
        </div>
    </div>
    <div class="more">
        <h2 onclick="">Click to view more.........</h2>
    </div>

     <div class="container">
        <h1><u>About You</u></h1>
        <form method="$_POST"  action="index.php">
            <div class="row">
                <div class="col-25">
                    <label for="fname">First Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Last Name</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="country">Country</label>
                </div>
                <div class="col-75">
                    <select id="country" name="country">
                        <option value="australia">India</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Subject</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="Write something.."
                        style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div> -->

    <div class="footer">
        <h1>Thank You For Visiting Us.</h1>
    </div>
    <div class="footer-basic">
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="services.php">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">images/Cars & More © 2022</p>
    </div>
</body>

</html>
<?php 
// }
// else{
//      header("Location: login.php");
//      exit();
// }
 ?>