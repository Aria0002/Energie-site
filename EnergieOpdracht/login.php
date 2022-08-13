
<?php
require 'connection.php';
session_start();
$message = "";
if (count($_POST) > 0) {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $query = "SELECT * FROM `login2` WHERE `username` = '" . $user . "' AND `password` = '" . $pass . "'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["username"] = $row['username'];
        $_SESSION["role"] = $row['role'];
        header("Location:index.php");
    } else {
        $message = "Invalid Username or Password!";
    }
}



?>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="opmaak.css">
</head>
<body style="background-color: lightblue">
<form name="frmUser" method="post" action="">
    <div style="background-color: lightskyblue" class="login-box">
    <h3 class="label">Enter Login Details</h3>
    <h4 class="label">Username:</h4><br>
    <input style="background-color: lightblue" class="input-box" type="text" name="username" placeholder="Enter your username here">
    <br>
    <h4 class="label">Password:</h4><br>
    <input class="input-box" type="password" name="password" placeholder="Enter your password here">
    <br><br>
    <input class="btn" type="submit" name="submit" value="Submit">
    <input class="btn" type="reset">
    </div>
</form>
</body>
</html>