<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
    <title>Document</title>
</head>
<body>
  
  <div class="board">
    <div class="head">
     <h2>Overview</h2>
        <h3>satveer</h3>
  
    </div>
    
    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>

    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>

    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>

    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>

    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>

    <div class="des">
         <h2>Manthly Expense</h2>  
         <span>8374</span>
    </div>


    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    <canvas id="Chart" style="width:100%;max-width:600px"></canvas>

  </div>
    

</body>
    <script>
const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
const yValues = [55, 49, 44, 24, 15];
const barColors = ["red", "green","blue","orange","brown"];

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
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
new Chart("Chart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>
</html>