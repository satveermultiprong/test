<?php
include("header.php");
include("config.php");
$category = $item = $price = $date= $mode =  "";
$total = 0;
$errorMsg = "";

if (isset($_POST['submit'])) {
    // Validation for category
    if (empty($_POST['category'])) {
        $errorMsg = "Category is required";
    } else {
        $category = $_POST['category'];
    }

    // Validation for item
    if (empty($_POST['item']) || !preg_match("/^[a-zA-Z ]*$/", $_POST['item'])) {
        $errorMsg = "Item name is required";
    } else {
        $item = $_POST['item'];
    }

    // Validation for date
    if (empty($_POST['date'])) {
        $errorMsg = "Date is required";
    } else {
        $currentDate = date("Y-m-d");
        if ($_POST['date'] > $currentDate) {
            $errorMsg = "Invalid date. Please select a date not later than today.";
        } else {
            $date = $_POST['date'];
        }
    }
    // Validation for price
    if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
        $errorMsg = "Price is required and must be a number";
    } else {
        $price = $_POST['price'];
    }

    // Validation for mode
    if (empty($_POST['mode'])) {
        $errorMsg = "Mode of payment is required";
    } else {
        $mode = $_POST['mode'];
    }

    if (empty($errorMsg)) {
        // Insert data into the database if no validation errors
        $sql = "INSERT INTO expense (category, item, expanse_date, payment_mode, price) VALUES
            ('$category', '$item', '$date', '$mode', '$price')";

        $result = mysqli_query($con, $sql);

        if ($result == true) {
            echo "Data inserted successfully";
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Data not inserted";
        }
    }
        // Store error message in session
        $_SESSION['errorMsg'] = $errorMsg;
}
// Check if there's an error message in the session
if (isset($_SESSION['errorMsg'])) {
    $errorMsg = $_SESSION['errorMsg'];
    unset($_SESSION['errorMsg']); // Clear the session variable
}
// 
// Delete expense logic
if (isset($_GET['delete_expense'])) {
    // Get the selected expense ID from the URL
    $expenseId = $_GET['delete_expense'];

    // Delete the selected expense
    $deleteExpenseQuery = "DELETE FROM expense WHERE id = '$expenseId'";
    $deleteExpenseResult = mysqli_query($con, $deleteExpenseQuery);

    if ($deleteExpenseResult) {
        echo "Expense deleted successfully";
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Failed to delete expense";
    }
}
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

    <h2>
        Add Expense
    </h2>
    <!-- Display error message if any -->
    <?php if (!empty($errorMsg)) { ?>
            <p style="color: red; font-size: medium; "><?php echo $errorMsg; ?></p>
        <?php } ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="cat">Category:-</label>
        <select name="category" id="cat" >
            <option value=""></option>
     <!-- Display category from category table -->
        <?php
        $facthcategory = "SELECT * from category order by category_name asc";
        $fatchcategoryquery = mysqli_query($con,$facthcategory);

        if($fatchcategoryquery == true){
    
        while($row1 = mysqli_fetch_array($fatchcategoryquery)){
            $category_id = $row1["id"];
            $category_name = $row1["category_name"];
        ?>
            <option value="<?php echo $category_id ?>" ><?php echo $category_name ?></option>
        <?php
        }
    }
        ?>
        </select> 
        <input type="text" placeholder="Item name" name="item">
        <input type="date" name="date" id="" name="date">
        <input type="text" placeholder="Price" name="price">

        <label for="cat">Mode of payment:-</label>
        <select name="mode" id="mode" >
            <option value=""></option>
            <option value="CASH">CASH</option>
            <option value="UPI">UPI</option>
            <option value="Net banking">Net banking</option>
            <option value="Debit card">Debit card</option>
            <option value="Credit card">Credit card</option>
        </select>

        <input type="submit" value="Add" name="submit">
    </form>
   <h2>Our Twoday Expense</h2>
   
    <table>
        <tr>
          <th>S.no.</th>
          <th>Category</th>
          <th>Item</th>
          <th>Date</th>
          <th>Mode of payment</th>
          <th>Expense</th>
          <th>Action</th>
          
        </tr>

        <?php 

       $currentdate = date("Y-m-d");
       
       $sqli = "SELECT expense.*,category.category_name FROM expense LEFT JOIN category  ON expense.category = category.id WHERE date(added_on) = '$currentdate'";
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
    <td><?php echo  $sn++; ?></td>
    <td><?php echo $category1; ?></td>
    <td><?php echo $item1; ?></td>
    <td><?php echo $date1 ; ?></td>
    <td><?php echo $mode1; ?></td>
    <td><?php echo $price1 ;?></td>
    <td><?php echo "<a href='" . $_SERVER['PHP_SELF'] . "?delete_expense=" . $row["id"] . "'>Delete</a>" ?></td>
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