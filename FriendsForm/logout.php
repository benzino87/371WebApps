<?php
session_start();
unset($_SESSION['accName']);
session_destroy();
?>
<html>
    <body class="logout">
        <h4>You have been logged out</h4>
        <h2><a href="login.php">click here to login</a></h2>
    </body>
</html>