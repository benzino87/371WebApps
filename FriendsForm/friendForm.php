<?php
session_start();
if(!isset($_SESSION['accName']) || $_SESSION['superUser'] == false){
  header("Location: login.php");
}

// define variables and set to empty values
$firstName = $lastName = $phoneNum = $age = $accName = "";
$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";
$emptyFields = false;
$response = "";


    $conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error())."<br>";
}
/**
 * Check all of the forms fields for entries
 **/

  if (empty($_POST['fname'])) {
    $emptyFields = true;
  } else {
    $firstName = $_POST['fname'];
  }

  if (empty($_POST['lname'])) {
    $emptyFields = true;
  } else {
    $lastName = $_POST['lname'];
  }

  if (empty($_POST['phone'])) {
    $emptyFields = true;
  } else {
    $phoneNum = $_POST['phone'];
  }

  if (empty($_POST['age'])) {
    $emptyFields = true;
  } else {
    $age = $_POST['age'];
  }
  
  if (empty($_POST['accName'])) {
    $emptyFields = true;
  } else {
    $accName = $_POST['accName'];
  }
  
  if($emptyFields == false){
    $insert = "INSERT INTO FRIENDS(firstname, lastname, phonenumber, age, accName)
                VALUES('$firstName', '$lastName', '$phoneNum', '$age', '$accName')";

    if(mysqli_query($conn, $insert)){
       $response = "Success! New new friend added!";
    }else{
       echo "ERROR: ".$insert . "<br>" .mysqli_error($conn);
    }
  }else{
    $response = "Make sure form is completely filled out";
  }

  /**
   * TEXT FILE SAVE
   **/
  $myFile = fopen("friendsFile.txt", "a");
  $friendData = $firstName.','.$lastName.','.$phoneNum.','.$age.','.$accName."\n";
  fwrite($myFile, $friendData);
  fclose($myFile);
  
?>
<html>
    <head>
        <title>Friend Form</title>
           <link rel="stylesheet" href="friend.css" type="text/css" />
    </head>
    <body>
      <div class="friend">
        <h2>Hello! Will you be my friend?</h2>
        <h4>If so, then enter your info below!</h4>
            <form method = "POST" action="friendForm.php">
              <li>First Name:<input type="text" name="fname" value="<?=$firstName?>"/></li>
              <li>Last Name:<input type="text" name="lname"value="<?=$lastName?>"/></li>
              <li>Phone Number:<input type="number" name="phone" min="1000000000" max="9999999999" value="<?=$phoneNum?>"/></li>
              <li>Age:<input type="number" name="age" min="1" max="100" value="<?=$age?>"/></li>
              <li>Account:<input type="text" name="accName" value<?=$accName?>/></li>
              <li><input type="submit" value="Submit"/></li>
            </form>
        <h4><?php echo $response?></h4>
        <h4><a href="friendDisplay.php">Take me to my friends</a></h4>
        <h4><a href="logout.php">Logout</a></h4>
      </div>
    </body>
</html>