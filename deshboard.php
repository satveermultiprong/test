<?php
include("config.php");
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media_style.css">
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

    <!-- .................................................... -->

     <div class="charts">
            <canvas id="myChart"></canvas>
            <canvas id="myLineChart"></canvas>  

      </div>

  </div>
</body>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script>
// Fetch data using AJAX
document.addEventListener("DOMContentLoaded", function () {
fetch('data.php')
    .then(response => response.json())
    .then(data => {
        const xValues = Object.keys(data);
        const yValues = Object.values(data);
        const barColors = ["red", "green", "blue", "orange", "#747d8c", "#00d2d3" , "#341f97","#B53471","#C4E538"];

        // Bar chart
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: "Expense by Category "
                }
            }
        });


        fetch('data.php?chart=line')
                        .then(response => response.json())
                        .then(lineData => {
                            const lineXValues = Object.keys(lineData);
                            const lineYValues = Object.values(lineData);

                            // Line chart
                            new Chart("myLineChart", {
                                type: "line",
                                data: {
                                    labels: lineXValues,
                                    datasets: [{
                                        borderColor: "purple",
                                        data: lineYValues,
                                        fill: false,
                                        label: "Line Chart"
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Yearly Expense (Line Chart)"
                                    }
                                }
                            });
                        })
                        .catch(error => console.error('Error fetching line chart data:', error));
                })

    .catch(error => console.error('Error fetching data:', error));
  });
</script>
</html>