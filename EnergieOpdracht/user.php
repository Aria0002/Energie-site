<?php
require 'connection.php';
session_start();

//does't let you go to other pages in url
if(!isset($_SESSION["username"])) {
    header("Location: index.php");
}
?>
<?php
// checks if you're logged in
if(isset($_SESSION["username"])) {
    echo "Welcome " . $_SESSION["username"] . " Click here to" . "<a href='logout.php'>" . " Logout </a>";
}
?>

  <?php
// gets data form database and adds to page
$query = "SELECT * FROM boeken";
$result = mysqli_query($con, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
    if ($_SESSION['username'] == 'Ari'){
        if ($row["jaar"] == "2019" && $row["klant"] == "1" ){
            $chart_data1 .= "{ maand:'".$row["maand"]."', gas:".$row["gas"]." , elektriciteit:".$row["elektriciteit"]."}, ";
        }
        if ($row["jaar"] == "2020" && $row["klant"] == "1"){
            $chart_data2 .= "{ maand:'".$row["maand"]."', gas:".$row["gas"] .", elektriciteit:".$row["elektriciteit"]."}, ";
        }
        if ($row["jaar"] == "2021" && $row["klant"] == "1"){
            $chart_data3 .= "{ maand:'".$row["maand"]."', gas:".$row["gas"].", elektriciteit:".$row["elektriciteit"]."}, ";
        }
    }
   if ($_SESSION['username'] == 'davy') {
      if ($row["jaar"] == "2019" && $row["klant"] == "2") {
          $chart_data1 .= "{ maand:'" . $row["maand"] . "', gas:" . $row["gas"] . " , elektriciteit:" . $row["elektriciteit"] . "}, ";
      }
      if ($row["jaar"] == "2020" && $row["klant"] == "2") {
          $chart_data2 .= "{ maand:'" . $row["maand"] . "', gas:" . $row["gas"] . ", elektriciteit:" . $row["elektriciteit"] . "}, ";
      }
      if ($row["jaar"] == "2021" && $row["klant"] == "2") {
          $chart_data3 .= "{ maand:'" . $row["maand"] . "', gas:" . $row["gas"] . ", elektriciteit:" . $row["elektriciteit"] . "}, ";
      }
  }
}
$chart_data = substr($chart_data, 0, -2);
?>

    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="layout.css">
        <title>overview gas and electricity</title>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    </head>

    <body>
    <?php
    if ($_SESSION['username'] == 'Ari'){
    ?>
        <li><a class="link" href="index.php">Home</a></li>
    <?php
    }
?>



    <div class="container" style="width:900px;">
        <h2>overview gas and electricity</h2>
        <h3>Gas in: m3</h3>
        <h3>Electricity in: kWh</h3>
        <br />
        <h2>2019</h2>
        <div id="chart1"></div>
        <h2>2020</h2>
        <div id="chart2"></div>
        <h2>2021</h2>
        <div id="chart3"></div>
    </div>


    <script>
        Morris.Bar({
            element : 'chart1',
            data:[<?php echo $chart_data1; ?>],
            xkey:'maand',
            ykeys:['gas', 'elektriciteit'],
            labels:[ 'gas', 'elektriciteit'],
            hideHover:'auto',
            stacked:true
        });
        Morris.Bar({
            element : 'chart2',
            data:[<?php echo $chart_data2; ?>],
            xkey:'maand',
            ykeys:['gas', 'elektriciteit'],
            labels:[ 'gas', 'elektriciteit'],
            hideHover:'auto',
            stacked:true
        });
        Morris.Bar({
            element : 'chart3',
            data:[<?php echo $chart_data3; ?>],
            xkey:'maand',
            ykeys:['gas', 'elektriciteit'],
            labels:[ 'gas', 'elektriciteit'],
            hideHover:'auto',
            stacked:true
        });

    </script>
    </body>

    </html>
