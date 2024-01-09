<?php 
include("header.php");
include("config.php") ;

$categoryFilter = isset($_GET['category_filter']) ? $_GET['category_filter'] : 'all';
$dateFilterStart = isset($_GET['date_filter_start']) ? $_GET['date_filter_start'] : '';
$dateFilterEnd = isset($_GET['date_filter_end']) ? $_GET['date_filter_end'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
  <div class="main">
    <h2>Transection</h2>

   <!-- Filter form -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="category_filter">Filter by Category:</label>
        <select name="category_filter" id="category_filter">
            <option value="all" <?php echo ($categoryFilter === 'all') ? 'selected' : ''; ?>>All</option>
            <option value="Food" <?php echo ($categoryFilter === 'Food') ? 'selected' : ''; ?>>Food</option>
            <option value="Transportation" <?php echo ($categoryFilter === 'Transportation') ? 'selected' : ''; ?>>Transportation</option>
            <option value="Health care" <?php echo ($categoryFilter === 'Health care') ? 'selected' : ''; ?>>Health care</option>
            <option value="Groceries" <?php echo ($categoryFilter === 'Groceries') ? 'selected' : ''; ?>>Groceries</option>
            <option value="Education" <?php echo ($categoryFilter === 'Education') ? 'selected' : ''; ?>>Education</option>
            <option value="Fastion" <?php echo ($categoryFilter === 'Fastion') ? 'selected' : ''; ?>>Fastion</option>
            <option value="Stationery" <?php echo ($categoryFilter === 'Stationery') ? 'selected' : ''; ?>>Stationery</option>
            <option value="Electronics" <?php echo ($categoryFilter === 'Electronics') ? 'selected' : ''; ?>>Electronics</option>
            <option value="Entertainment" <?php echo ($categoryFilter === 'Entertainment') ? 'selected' : ''; ?>>Entertainment</option>
            <option value="investment" <?php echo ($categoryFilter === 'investment') ? 'selected' : ''; ?>>Investment</option>
            <option value="EMI" <?php echo ($categoryFilter === 'EMI') ? 'selected' : ''; ?>>EMI</option>
            
        <!-- Add more options for other categories -->

        </select> 
        <label for="date_filter_start">Filter by Start Date:</label>
        <input type="date" name="date_filter_start" id="date_filter_start" value="<?php echo $dateFilterStart; ?>">
        <label for="date_filter_end">Filter by End Date:</label>
        <input type="date" name="date_filter_end" id="date_filter_end" value="<?php echo $dateFilterEnd; ?>">
        <input class="sub" type="submit" value="Filter" >
    </form>

    <table style="margin:50px;">
      <tr>
        <th>S.no.</th>
        <th>Category</th>
        <th>Item</th>
        <th>date</th>
        <th>Mode of payment</th>
        <th>Expense</th>
        
      </tr>

      <?php 

     $total =0;


    // Fetch data based on the filter
        if ($categoryFilter === 'all' && empty($dateFilterStart) && empty($dateFilterEnd)) {
            $sqli = "SELECT * FROM expense";
        } elseif ($categoryFilter === 'all' && !empty($dateFilterStart) && !empty($dateFilterEnd)) {
            $sqli = "SELECT * FROM expense WHERE expanse_date BETWEEN '$dateFilterStart' AND '$dateFilterEnd'";
        } elseif ($categoryFilter !== 'all' && empty($dateFilterStart) && empty($dateFilterEnd)) {
            $sqli = "SELECT * FROM expense WHERE category = '$categoryFilter'";
        } elseif ($categoryFilter !== 'all' && !empty($dateFilterStart) && !empty($dateFilterEnd)) {
            $sqli = "SELECT * FROM expense WHERE category = '$categoryFilter' AND expanse_date BETWEEN '$dateFilterStart' AND '$dateFilterEnd'";
        }



     $result1 = mysqli_query($con, $sqli);

 if($result1 == true){
  $count = mysqli_num_rows($result1);

//    $sn = 1;
 if($count > 0){
 while($row = mysqli_fetch_array($result1)){
  $id = $row["id"];
  $category1 = $row["category"];
  $item1 = $row["item"];
  $date1 = $row["expanse_date"];
  $mode1 = $row["payment_mode"];
  $price1 = $row["price"];
  $total += $price1;

      ?>
  
 <tr>
  <td><?php echo $id; ?></td>
  <td><?php echo $category1; ?></td>
  <td><?php echo $item1; ?></td>
  <td><?php echo $date1 ; ?></td>
  <td><?php echo $mode1; ?></td>
  <td><?php echo $price1 ;?></td>
</tr>

<?php
}
}
}
   ?>  
      <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
         <th>Total</th>
         <td><?php echo $total; ?></td>
      </tr>
      
  </table>
  </div>
</body>
</html>