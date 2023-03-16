<?php 
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];

if (!isset($username) && !isset($password)) {
    header("location: adminLogin.php");
}

if (isset($_POST['Logout'])) {
         session_reset();
         session_destroy();
         header("location: adminLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usertable.css" />
    <title>Users </title>
    <script>
        function checkdelete() {
            return confirm('Are sure You Want to Delete this?');
        }

        function info() {
            return alert("ID, Name ,Email");
        }
    </script>
</head>

<body>
    <?php
    include "connection.php";
    $con = new connection();
    $query = "SELECT * FROM usertable";
    $data = $con->connect()->query($query);
    $total = $data->fetch();
    ?>
    <center>
        <h2>Displaying All Records</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col" colspan="2">Edit</th>
                </tr>
            </thead>
            <?php
            while ($result = $data->fetch()) {
                echo " <tr>
            <td align='center'>" . $result['id'] . "</td>
            <td align='center'>" . $result['name'] . "</td>
            <td align='center' >" . $result['email'] . "</td>
            <td align='center'>" . $result['phone'] . "</td>
            <td>
            <a href='update_admin.php?id=$result[id] '><input type='submit'value='update'class='update'></a> 
            &nbsp;&nbsp;    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
             <a href='delete_admin.php?id=$result[id]'><input type='submit'value='Delete'class='delete'onclick='return checkdelete()'></a>
             &nbsp;&nbsp;    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;            
            </tr>
        ";
            }
            ?>
        </table>
        <footer>
            <a href="index.php"><input type="submit" name="LogOut" value="Log Out" class='update'></a>
        </footer>
    </center>
</body>

</html>