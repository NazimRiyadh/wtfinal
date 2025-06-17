<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="../controller/control_login.php" method='POST'>
    <H1>Login Portal</H1>
    <table>
        <tr>
            <td><label for="username">Username</label></td>
            <td><input type="text" name="username" id="username"></td>
        </tr>
        <tr>         
            <td><label for="password">Password</label></td>
            <td><input type="password" name="password" id="password"></td>           
        </tr>
        <tr>
            <td><input type="submit" value="Login"></td>
            <td><a href="register.php">Register</a></td>
        </tr>
    </table>
    </form>
</body>
</html>