<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maryam's Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="Container">
        Login form
    </div>
    <form action=" "> 
    <div class="loginbox">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username">

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password">
        
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>

<?php
error_reporting(0);
$username = $_GET['username'];
$password = $_GET['password'];
if ($username == 'maryam' && $password == '123') {

    header('Location: http://localhost/crud/dashboard.php?username=' . $username);
    exit;

} else {
    if (!empty($_GET)) {
        echo "Username and/or Password is wrong";
    }

}
?>