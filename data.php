<?php
   include("config.php");
// Assuming you have a table named 'expense' with columns 'category' and 'price'
if(isset($_GET['chart']) && $_GET['chart'] == 'line') {

    $currentYear = date("Y");

    $sql = "SELECT category, SUM(price) as total_price FROM expense WHERE YEAR(expanse_date) = '$currentYear' GROUP BY category";
    $result = mysqli_query($con, $sql);
    
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['category']] = $row['total_price'];
    }
    
    echo json_encode($data);
 }

else{
$sql4 = "SELECT category, SUM(price) as total_price FROM expense GROUP BY category";
$result4 = mysqli_query($con, $sql4);

$data = array();
while ($row = mysqli_fetch_assoc($result4)) {
  $data[$row['category']] = $row['total_price'];
}

echo json_encode($data);
}
?>