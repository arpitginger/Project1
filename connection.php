<?php 
// $con = mysqli_connect("localhost", "root", "", "userform");

// $servername = "localhost";
// $username = "root";
// $password = "123456";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=userform", $username, $password);
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   echo "Connected successfully";
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

class connection
{
    private $localhost;
    private $username;
    private $password;
    private $database;
    private $json;
    private $json_data;
public function connect()
    {
        $filepth = dirname(__FILE__);
        $this->json = file_get_contents($filepth.'/dbCredentials.json');
        $this->json_data = json_decode($this->json,true);
        $this->localhost = $this->json_data['localhost1'];
        $this->username = $this->json_data['username'];
        $this->password = $this->json_data['password'];
        $this->database = $this->json_data['database'];
        try {
            $conn = new PDO("mysql:host=$this->localhost;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
 ?>