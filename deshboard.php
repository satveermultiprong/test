<?php
include("config.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/chart.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
     </script>
    <title>Document</title>
</head>
<body>
  
  <div class="board">

    <div class="head" >
        <h2>Overview</h2>
        <h3>satveer</h3>
    </div>
    <div class="maindes">

    <div class="des" id="a" > 
      <?php
      $twodate = date("Y-m-d");
      
      $sql = "SELECT sum(price) as total_price FROM `expense` WHERE DATE(expanse_date) = '$twodate'" ;
      $result = mysqli_query($con, $sql); 
      while ($row = mysqli_fetch_array($result))
      {
        $price = $row["total_price"];
      }
      ?>
      <span><?php echo $price; ?></span>
         <h2>Today Expense</h2>  
    </div>

   <div class="des" id="b" >
     <?php
      $startdatemonth = date("Y-m-01");
      // $twodate = date("Y-m-d");
      $sql1 = "SELECT sum(price) as total_price FROM `expense` WHERE expanse_date BETWEEN '$startdatemonth' AND '$twodate'" ;
      $result1 = mysqli_query($con, $sql1); 
      while ($row = mysqli_fetch_array($result1))
      {
        $price1 = $row["total_price"];
      }
      ?>
      <span><?php echo $price1; ?></span>
         <h2>Monthly Expense</h2>  
    </div>

    <div class="des" id="c" >
    <?php
      $startdateyear = date("Y-01-01");
      // $twodate = date("Y-m-d");
      
      $sql2 = "SELECT sum(price) as total_price FROM `expense` WHERE expanse_date BETWEEN '$startdateyear' AND '$twodate'" ;
      $result2 = mysqli_query($con, $sql2); 
      while ($row = mysqli_fetch_array($result2))
      {
        $price2 = $row["total_price"];
      }
      ?>
      <span><?php echo $price2; ?></span>
         <h2>This Year Expense</h2>  
    </div>

    <div class="des" id="d" >
    <?php
    
      $sqli = "SELECT sum(price) as total_price FROM `expense`" ;
      $resulti = mysqli_query($con, $sqli); 
      while ($row = mysqli_fetch_array($resulti))
      {
        $price3 = $row["total_price"];
      }
      ?>
      <span><?php echo $price3; ?></span>
         <h2>Total Expense</h2>  
    </div>
 </div>
    <!-- .................................................... -->
     <div class="charts">
            <canvas id="myChart"></canvas>
            <canvas id="myLineChart"></canvas>  

      </div>

  </div>
</body>
</html>