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

$query = "SELECT *
            FROM FRIENDS";
            
$result = mysqli_query($conn, $query);

if($result){
    echo "HERE ARE ALL OF YOUR FRIENDS<br>";
    while($row = mysqli_fetch_assoc($result)){
        echo "id: " .$row["id"]. " - Name: ".$row["firstname"]. " ".$row["lastname"] . " - Phone#: ".
        $row["phonenumber"]. " - Age: ".$row["age"]. "<br>";
    }
}else{
    echo "ERROR: You have no frineds";
}

mysqli_close($conn);


?>