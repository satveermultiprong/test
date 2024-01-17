<?php
   include("config.php");
// Assuming you have a table named 'expense' with columns 'category' and 'price'
if(isset($_GET['chart']) && $_GET['chart'] == 'line') {

    $currentYear = date("Y");
    $sql = "SELECT category_name, SUM(price) as total_price FROM expense 
    LEFT JOIN category ON expense.category = category.id WHERE YEAR(expanse_date) = '$currentYear'
    GROUP BY category_name";

    // $sql = "SELECT category, SUM(price) as total_price FROM expense
    //  WHERE YEAR(expanse_date) = '$currentYear' GROUP BY category";

    $result = mysqli_query($con, $sql);
    
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$row['category_name']] = $row['total_price'];
    }
    
    echo json_encode($data);
 }

else{
  $sql4 = "SELECT category_name, SUM(price) as total_price FROM expense 
        LEFT JOIN category ON expense.category = category.id
        GROUP BY category_name";
$result4 = mysqli_query($con, $sql4);

$data = array();
while ($row = mysqli_fetch_assoc($result4)) {
  $data[$row['category_name']] = $row['total_price'];
}

echo json_encode($data);
}
?>