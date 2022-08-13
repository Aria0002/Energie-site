<?php
require 'connection.php';
session_start();
echo '<span style="color:cornflowerblue;">welcome admin</span>'
?>
<head>
    <link rel="stylesheet" href="opmaak.css"
</head>
<body>
<nav style="background-color: #bfd2ff">
    <ul>
        <?php
        if($_SESSION['role'] !== "admin") {
            header("Location: login.php");
        }
        if(isset($_SESSION["username"])) { ?>
        <?php echo '<span style="color:darkblue;">' . "Hey " . $_SESSION["username"]; ?>. Click here to <a href="logout.php">Logout.

            <?php
            }
            ?>
                <ul class="navbar">
                    <li><a class="link" href="signUp.php">Sign Up</a></li>
                    <li><a class="link" href="admin_toevoegen.php">Add information</a></li>
                    <li><a class="link" href="user.php">user</a></li>
                </ul>

    </ul>
</nav>
