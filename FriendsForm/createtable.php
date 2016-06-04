<?php
$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";


    $conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error())."<br>";
}else{
    echo "Connection sucessfull<br>";
}

$create = "CREATE TABLE FRIENDS(
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              firstname VARCHAR(20),
              lastname VARCHAR(20),
              phonenumber VARCHAR(10),
              age INT(100)
              )";

if(mysqli_query($conn, $create)){
    echo "TABLE: FRIENDS CREATED SUCCESSFULLY<br>";
}else{
    echo "ERROR: ".mysqli_error($conn); "<br>";
}


mysqli_close($conn);
?>