<?php

require "connection.php";
session_start();

$username = $_POST['username'];
$pass = $_POST["password"];
if (empty($username) && empty($pass)) {
    return;
}

//login
//$query = "SELECT `username`, `pwd` FROM `users` WHERE `username` = '$username' AND `pwd` = '$pwd'";

//signup
$query = "INSERT INTO `login2`(`username`, `password`, `role`) VALUES ('$username','$pass','user')";

mysqli_query($con, $query);
header("Location: login.php");

