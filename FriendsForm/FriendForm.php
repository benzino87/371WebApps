<html>
    <head>
        <title>Friend Form</title>
           <link rel="stylesheet" href="friend.css" type="text/css" />
    </head>
    <body>
      

<?php
// define variables and set to empty values
$firstName = $lastName = $phoneNum = $age = "";
$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $error = "First name is required";
  } else {
    $firstName = $_POST["fname"];
  }

  if (empty($_POST["lname"])) {
    $error = "Last name is required";
  } else {
    $lastName = $_POST["lname"];
  }

  if (empty($_POST["phone"])) {
    $error = "Phone number is required";
  } else {
    $phoneNum = $_POST["phone"];
  }

  if (empty($_POST["age"])) {
    $age = "Age is required";
  } else {
    $age = $_POST["age"];
  }

  $myFile = fopen("friendsFile.txt", "a");
  $friendData = $firstName.','.$lastName.','.$phoneNum.','.$age."\n";
  fwrite($myFile, $friendData);
  fclose($myFile);
  
  
    $conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error())."<br>";
}

$checkTable = mysqli_query($conn, "SELECT * FROM FRIENDS");
$exists = mysqli_num_rows($checkTable);
if($exists == 0){


  $create = "CREATE TABLE FRIENDS(
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              firstname VARCHAR(20),
              lastname VARCHAR(20),
              phonenumber VARCHAR(10),
              age INT(100))";

  if(mysqli_query($conn, $create)){
    echo "TABLE: FRIENDS CREATED SUCCESSFULLY<br>";
  }
}

$insert = "INSERT INTO FRIENDS(firstname, lastname, phonenumber, age)
VALUES('$firstName', '$lastName', '$phoneNum', '$age')";

if(mysqli_query($conn, $insert)){
    echo "NEW FRIEND ADDED";
}else{
    echo "ERROR: ".$insert . "<br>" .mysqli_error($conn);
}


}
  
?>

  <div class="friend">
    <h2>Hello! Will you be my friend?</h2>
    <h4>If so, then enter your info below!</h4>
      <form method = "GET" action="FriendForm.php">
          <li>First Name:<input type="text" name="fname" value="<?=$firstName?>"/></li>
          <li>Last Name:<input type="text" name="lname"value="<?=$lastName?>"/></li>
          <li>Phone Number:<input type="number" name="phone" min="1000000000" max="9999999999" value="<?=$phoneNum?>"/></li>
          <li>Age:<input type="number" name="age" min="1" max="100" value="<?=$age?>"/></li>
          <li><input type="submit" name="formSubmit" value="Submit"/></li>
      </form>
      
  
      
</div>

</body>
</html>