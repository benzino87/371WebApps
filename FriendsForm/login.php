<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="friend.css" type="text/css" />
    <body>
        <div class="login">
            <h1>Login to view your friends!</h1>
                <form method="POST" action="verify.php">
                    <li>Account Name:<input type="text" maxlength=20 name="accName"/></li>
                    <li>Password:<input type="password" maxlength=20 name="pwd"/></li>
                    <input type="submit" value="Submit"/>
                </form>
        </div>
    </body>
</html>