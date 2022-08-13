<?php

$dbHost = 'localhost';
$dbUsername = '86897';
$dbPassword = 'Rotterdam100';
$dbName = 'energie';

$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$con) {
    die('connection failed: ' . mysqli_connect_error());
}