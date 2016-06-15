<?php
session_start();
$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";

$validCred = false;
$isSuperUser = false;


/**
 * Load in acounts from SQL to validate for current entered account
 **/
    if(isset($_POST['accName'])){
    $_SESSION['accName'] = $_POST['accName'];
    $accName = $_POST['accName'];

    $query = "SELECT * 
                FROM ACCOUNT 
                WHERE accName = '$accName';";
                
    $conn = mysqli_connect($servername, $username, $password, $db);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error())."<br>";
    }
    

    $result = mysqli_query($conn, $query);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            if($_POST['pwd'] == $row['password']){
                $validCred = true;
                if($row['superUser'] == 1){
                    $isSuperUser = true;
                    $_SESSION['superUser'] = true;
                }else{
                    $_SESSION['superUser'] = false;
                }
            }
        }
    }
    if($validCred == false){
        header("Location: login.php");
    }
    if($isSuperUser == true){
        header("Location: friendForm.php");
    }else{
        header("Location: friendDisplay.php");
    }
}
?>
