<?php
include "connection.php";
error_reporting(0); 

$con = new connection();

$id = $_GET['id'];
$query = "SELECT * FROM usertable WHERE id='$id'";

$data = $con->connect()->query($query);
$total = $data->fetch();
$result = $total;

if ($_POST['update']) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $query = "UPDATE usertable SET name='$username', email='$email', phone='$phone' where id='$id'";
    $data = $con->connect()->query($query);
    if ($data) {
        header("Location: admin.php");
    } else {
        echo "error";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update data </title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="form-body">
            <h2 class="title">Update Data</h2>

            <form name="form" class="the-form" id="form" method="post">

                <label for="username"> User Name</label>
                <input type="text" name="username" id="username" value="<?php echo $result['name']; ?>" required>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $result['email']; ?>" required>

                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" id="phone" value="<?php echo $result['phone']; ?>" required>

                <input type="submit" id="button" value="Update" name="update" onclick="updateRecord();">

            </form>
        </div>
        <script>
        function updateRecord() {
  var name = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;

  var letters = /^[A-Za-z]+$/;
  var filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var tel = /^(\+91[\-\s]?)?[0]?(91)?[1-9]\d{9}$/;

  if (name == "") {
    alert("Please enter your name");
  } else if (name.length < 6 || name.length > 16) {
    alert("Name must be between 6 to 15 characters long.");
     console.log.autofocus; 
  } else if (!letters.test(name)) {
    alert("User Name required only alphabet characters");
  } else {
    if (email == "") {
      alert("Please enter your user email id");
    } else if (!filter.test(email)) {
      alert("Invalid email");
    } else {
      if (phone == "") {
        alert("Please enter the phone number.");
      } else if (!tel.test(phone)) {
        alert("Phone number must be of 10 digits starting from 1 to 9");
        location.reload();
      } else {
              alert("Valid values");
      }
    }
  }
}
        </script>

</body>

</html>
