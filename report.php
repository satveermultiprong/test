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
        <label for="cat">Filter by Category:-</label>
        <select name="category_filter" id="category_filter">
            <option value="all" <?php echo ($categoryFilter === 'all') ? 'selected' : ''; ?>>All</option>
     <!-- Display category from category table -->
        <?php
        $facthcategory = "SELECT * from category order by category_name asc";
        $fatchcategoryquery = mysqli_query($con,$facthcategory);
        if($fatchcategoryquery == true){
        while($row1 = mysqli_fetch_array($fatchcategoryquery)){
            $category_id = $row1["id"];
            $category_name = $row1["category_name"];
        ?>
            <option value="<?php echo $category_id ?>" <?php echo ($categoryFilter === "<?php echo $category_name ?>") ? 'selected' : ''; ?>><?php echo $category_name ?></option>
        <?php
        }
    }
        ?>
        </select> 
        <label for="date_filter_start">Filter by Start Date:</label>
        <input type="date" name="date_filter_start" id="date_filter_start" value="<?php echo $dateFilterStart; ?>">
        <label for="date_filter_end">Filter by End Date:</label>
        <input type="date" name="date_filter_end" id="date_filter_end" value="<?php echo $dateFilterEnd; ?>">
        <input class="sub" type="submit" value="Filter" >
    </form>

    <table>
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
     $limit = 4;
     
     if(isset($_GET['page'])){
        $page = $_GET['page'];
     }
     else{
        $page = 1;
     }
     $offset = ($page -1) * $limit;

    // Fetch data based on the filter
        if ($categoryFilter === 'all' && empty($dateFilterStart) && empty($dateFilterEnd)) {
            $sqli = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id LIMIT {$offset},{$limit}";

        } elseif ($categoryFilter === 'all' && !empty($dateFilterStart) && !empty($dateFilterEnd)) {
            $sqli = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id WHERE expanse_date BETWEEN '$dateFilterStart' AND '$dateFilterEnd'";

        } elseif ($categoryFilter !== 'all' && empty($dateFilterStart) && empty($dateFilterEnd)) {
            $sqli = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id WHERE category = '$categoryFilter'";

        } elseif ($categoryFilter !== 'all' && !empty($dateFilterStart) && !empty($dateFilterEnd)) {
            $sqli = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id WHERE category = '$categoryFilter' AND expanse_date BETWEEN '$dateFilterStart' AND '$dateFilterEnd'";
        }



     $result1 = mysqli_query($con, $sqli);

 if($result1 == true){
  $count = mysqli_num_rows($result1);

   $sn = 1;
 if($count > 0){
 while($row = mysqli_fetch_array($result1)){
  $id = $row["id"];
  $category1 = $row["category_name"];
  $item1 = $row["item"];
  $date1 = $row["expanse_date"];
  $mode1 = $row["payment_mode"];
  $price1 = $row["price"];
  $total += $price1;

      ?>
  
 <tr>
  <td><?php echo $sn++; ?></td>
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

  <?php
 $sql = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id";
 $result = mysqli_query($con, $sql);
 if (mysqli_num_rows($result) > 0) {
    $total_records = mysqli_num_rows($result);
    $total_page = ceil($total_records / $limit);

    echo '<ul class="pagination report-pagination" >';
    
    if ($page > 1) {
        echo '<li><a href="report.php?page=' . ($page - 1) . '">prev</a></li>';
    }

    $start_page = max($page - 2, 1);
    $end_page = min($start_page + 1, $total_page);

    for ($i = $start_page; $i <= $end_page; $i++) {
        $active = ($i == $page) ? "active" : "";
        echo '<li class="' . $active . '"><a href="report.php?page=' . $i . '">' . $i . '</a></li>';
    }

    if ($total_page > $end_page) {
        echo '<li><span>...</span></li>';
        echo '<li><a href="report.php?page=' . ($end_page + 1) . '">' . ($end_page + 1) . '</a></li>';
    }

    if ($total_page > $page) {
        echo '<li><a href="report.php?page=' . ($page + 1) . '">next</a></li>';
    }

    echo '</ul>';
}

  ?>
  </div>
</body>
</html>