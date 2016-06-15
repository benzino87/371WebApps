<?php
$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";

    $conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error())."<br>";
}

  $account = "CREATE TABLE ACCOUNT(
                accName VARCHAR(20) PRIMARY KEY,
                password VARCHAR(20) NOT NULL,
                superUser INT(1) NOT NULL
                )";

  $friends = "CREATE TABLE FRIENDS(
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              firstname VARCHAR(20) NOT NULL,
              lastname VARCHAR(20) NOT NULL,
              phonenumber VARCHAR(10) NOT NULL,
              age INT(100) NOT NULL,
              accName VARCHAR(20) NOT NULL,
              CONSTRAINT FOREIGN KEY(accName) REFERENCES ACCOUNT(accName)
              )";
    
    if(mysqli_query($conn, $account)){
    echo "TABLE: ACCOUNT CREATED SUCCESSFULLY<br>";
    }else{
        echo mysqli_error($conn);
    }
    
  if(mysqli_query($conn, $friends)){
    echo "TABLE: FRIENDS CREATED SUCCESSFULLY<br>";
  }else{
      echo mysqli_error($conn);
  }
  
  $defaultAcc0 = "INSERT INTO ACCOUNT(accName, password, superUser) VALUES('admin', '111111', 1)";
  $defaultAcc1 = "INSERT INTO ACCOUNT(accName, password, superUser) VALUES('Joe', '12345', 0)";
  $defaultAcc2 = "INSERT INTO ACCOUNT(accName, password, superUser) VALUES('Bill', '98765', 0)";
  
  
   if(mysqli_query($conn, $defaultAcc0)){
    echo "Successfull insert acc0<br>";
  }else{
      echo mysqli_error($conn)."<br>";
  }
  if(mysqli_query($conn, $defaultAcc1)){
    echo "Successfull insert acc1<br>";
  }else{
      echo mysqli_error($conn)."<br>";
  }
  if(mysqli_query($conn, $defaultAcc2)){
    echo "Successfull insert acc2<br>";
  }else{
      echo mysqli_error($conn)."<br>";
  }


?>
