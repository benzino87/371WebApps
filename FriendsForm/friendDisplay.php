<?php
session_start();
if(!isset($_SESSION['accName'])){
  header("Location: login.php");
}

$servername = "127.0.0.1";
$username = "benselj";
$password = "";
$db = "FRIENDSDB";


    $conn = mysqli_connect($servername, $username, $password, $db);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error())."<br>";
}
// }else{
//     echo "Connection sucessfull<br>";
// }
$accountOwner = $_SESSION['accName'];
/**need to add where clause **/
$query = "SELECT *
            FROM FRIENDS
            WHERE accName = '$accountOwner'";
            
?>
<html>
    <link rel="stylesheet" href="friend.css" type="text/css" />
    <body class="display">
        <h1>Here's a list of your friends</h1>
        <table>
            <tr id="headers">
                <th>ID</th>
                <th>Name</th>
                <th>Phone #</th>
                <th>Age</th>
            </tr>
            <?php
            $result = mysqli_query($conn, $query);
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[firstname] $row[lastname]</td>
                            <td>$row[phonenumber]</td>
                            <td>$row[age]</td>
                        </tr>";
                }
            }
            ?>
        </table>
        <h4><a href="logout.php">Logout</a></h4>
    </body>
</html>