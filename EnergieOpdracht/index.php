<?php
session_start();
switch($_SESSION['role']){
    case "user":
        header("Location: user.php");
        break;
    case "admin":
        header("Location: admin.php");
        break;
    default:
        break;
}
?>

<html>
<head> <link rel="stylesheet" href="layout.css"></head>

<body>
    <nav>
    <ul>
        <?php
        if(isset($_SESSION["username"])) { ?>
        Welcome <?php echo $_SESSION["username"]; ?>. Click here to <a href="logout.php">Logout.
        <?php
        }
        ?>
        <li><a href="login.php"> Log in</a></li>
    </ul>
    </nav>
    <h1>Energie</h1>
    <h2>Welcome to our page</h2>
    <h3>Here you can view how much energy you have consumed in recent years, including gas and electricity.</h3>
    <h3>There are several ways to save energy here are 7 things you can do to save energy.</h3>
    <br>
    <div class="div1">
    <h4> 1. Replace bulbs with LED lighting.</h4>
    <h4> 2. Use energy-efficient appliances.</h4>
    <h4> 3. Insulate like double glazing</h4>
    <h4> 4. Install a programmable thermostat.</h4>
    <h4> 5. Use a heat pump it is a sustainable alternative to a gas boiler for heating your home.</h4>
    <h4> 6. Use less water.</h4>
    <h4> 7. Use solar energy.</h4>
    </div>

</body>

</html>
