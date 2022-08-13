<?php
require 'connection.php';
session_start();

if($_SESSION['role'] !== "admin") {
    header("Location: login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="layout.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="">
    <label>Select a Category</label>
    <li><a class="link" href="index.php">Home</a></li>
    <select name="Category">
        <?php
        // use a while loop to fetch data
        // from the $all_categories variable
        // and individually display as an option
        $query = "SELECT `ID`,`username` FROM `login2`";
        $result = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $row['ID'];
            // The value we usually set is the primary key
            ?>">
                <?php echo $row["username"];
                // To show the category name to the user
                ?>
            </option>
        <?php
        }
        // While loop must be terminated
        ?>
    </select>
<?php
$ID = $_POST['Category'];
$maand = $_POST['maand'];
$jaar = $_POST['jaar'];
$gas = $_POST['gas'];
$elektriciteit = $_POST['elektriciteit'];

$query = "SELECT * FROM `account` WHERE `jaar` = '" . $jaar . "' AND `maand` = '" . $maand . "' AND `klant` = '". $ID ."'";
//    if (isset($_POST['submit'])) {
//        //$query = "SELECT * FROM `account` WHERE `jaar` = '" . $jaar . "' AND `maand` = '" . $maand . "' AND `gas` = '". $gas ."' AND `elektriciteit` = '" . $elektriciteit ."'";
//        //$query = "INSERT INTO `acount`(`jaar`, `maand`, `gas`, `elektriciteit`) VALUES ('$username','$pass','user')";
//        //$query2 = "SELECT * FROM `account` WHERE `klant` = 2";
//    }

    if (mysqli_num_rows($result) > 0){
           $query = "UPDATE account SET  gas = ". $gas .", elektriciteit = " . $elektriciteit;
           $query.=" WHERE jaar = " . $jaar . " AND maand = " . $maand . " AND klant = ". $ID;
           $result = mysqli_query($con, $query);
           if ($result){
               echo "data saved";
           }
        }

    else {
        $query = "INSERT INTO `acount`(`jaar`, `maand`, `gas`, `elektriciteit`) VALUES ('$jaar','$maand','$gas', '$elektriciteit')";
        $query.= " WHERE jaar = " . $jaar . " AND maand = " . $maand . "AND gas = " . $gas ."AND elektriciteit = " . $elektriciteit;
        $result = mysqli_query($con, $query);
        if ($result){
            echo "data added";
        }
    }

    ?>
    <h1>Register</h1>
        <p class="label">Year</p>
        <input type="text" name="jaar" placeholder="year...">
        <p class="label">Month</p>
        <input type="text" name="maand" placeholder="month...">
    <p class="label">Gas</p>
        <input type="text" name="gas" placeholder="gas...">
        <p class="label">Electricity</p>
        <input type="text" name="elektriciteit" placeholder="electricity...">
        <button class="btn" value="submit" type="submit" name="submit">Save</button>

</form>
</body>
</html>
