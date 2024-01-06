<?php
include("header.php");

include("config.php");

$category = $item = $price = $date= $mode =  "";
$total = 0;
// $id = $category1 = $item1 = $date1 =$mode1 = $price1 = "";
// $result1 ="";

if(isset($_POST['submit'])){
    $category =  $_POST['category'];
   $item = $_POST['item'];
   $date = $_POST['date'];
    $mode = $_POST['mode'];
    $price = $_POST['price'];

   $sql = "INSERT INTO expense (category , item ,expanse_date , payment_mode, price ) VALUES
    ('$category', '$item', '$date', '$mode' , '$price')";

   $result = mysqli_query($con ,$sql);

   if($result==true){
       echo "data inserted sucsesfully";
    header("Location: {$_SERVER['PHP_SELF']}");
    exit();

   }
   else{
    echo "data not inserted";
   }  

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">

    <h2>
        Add Expense
    </h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="cat">Category:-</label>
        <select name="category" id="cat" >
            <option value=""></option>
            <option value="Food">Food</option>
            <option value="Transportation">Transportation</option>
            <option value="Fastion">Fastion</option>
            <option value="Stationery">Stationery</option>
            <option value="Groceries">Groceries</option>
            <option value="Health care">Health care</option>
            <option value="Electronics">Electronics</option>
            <option value="EMI">EMI</option>
            <option value="Rent">Rent</option>
            <option value="Internet">Internet</option>
            <option value="Entertainment">Entertainment</option>
            <option value="Cellphone">Cellphone</option>
            <option value="Education">Education</option>
            <option value="investment">investment</option>
        </select> 
        <input type="text" placeholder="Item name" name="item">
        <input type="date" name="date" id="" name="date">
        <input type="text" placeholder="price" name="price">

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
   
    <table style="margin:50px;">
        <tr>
          <th>S.no.</th>
          <th>Category</th>
          <th>Item</th>
          <th>Date</th>
          <th>Mode of payment</th>
          <th>Expense</th>
          
        </tr>

        <?php 

       $currentdate = date("Y-m-d");
       
       $sqli = "SELECT * FROM expense WHERE date(added_on) = '$currentdate'";
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