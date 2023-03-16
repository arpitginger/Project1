<?php
require "connection.php";

$conn = new connection();

function hash_password($password) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function verify_password($password, $hashed_password) {
    return password_verify($password, $hashed_password);
}

function insertData($table,$values){
    $conn = new connection();
    $insert_data = "INSERT into $table values $values";
    $data = $conn->connect()->query($insert_data);
    return $data;
}

function fetchAll($table,$clause){
    $conn = new connection();
    $query = "SELECT * from $table where $clause";
    $data = $conn->connect()->query($query);
    return $data;
}

function insert($table,$values){
    $conn = new connection();
    $insert_data = "INSERT into $table values $values";
    $data = $conn->connect()->query($insert_data);
    return $data;
}

?>