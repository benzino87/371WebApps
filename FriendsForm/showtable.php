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

$sql = "SHOW TABLES";
mysqli_query($conn, $sql);

?>
