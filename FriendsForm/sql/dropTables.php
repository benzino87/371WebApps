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

$dropfriend = "DROP TABLE FRIENDS";
$dropaccount = "DROP TABLE ACCOUNT";


if(mysqli_query($conn, $dropfriend)){
    echo "FRIENDS DROPPED<br>";
}else{
    echo "ERROR: ".mysqli_error($conn); "<br>";
}

if(mysqli_query($conn, $dropaccount)){
    echo "ACCOUNTS DROPPED<br>";
}else{
    echo "ERROR: ".mysqli_error($conn); "<br>";
}


mysqli_close($conn);
?>