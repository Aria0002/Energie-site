<?php
session_start();
require "connection.php";
if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];

    //login
    $query = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `pwd` = '".$pwd."'";
    $result = mysqli_query($con,$query);

    if (mysqli_num_rows($result) > 0){
        $_SESSION['username']= $username;
        header("Location: index.php");
    }
    else {
       header("Location: login.php");
    }
}

else {
    echo "foooutt";
}