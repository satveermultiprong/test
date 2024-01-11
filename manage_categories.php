<?php
include("header.php");
include("config.php");

if (isset($_POST['add_category'])) {
    // Validation for category
    if (empty($_POST['new_category'])) {
        $errorMsg = "Category name is required";
    } else {
        $newCategory = $_POST['new_category'];

        // Check if the category already exists
        $checkCategoryQuery = "SELECT * FROM category WHERE category_name = '$newCategory'";
        $checkCategoryResult = mysqli_query($con, $checkCategoryQuery);

        if (mysqli_num_rows($checkCategoryResult) > 0) {
            $errorMsg = "Category already exists";
        } else {
            // Insert new category into the 'category' table
            $insertCategoryQuery = "INSERT INTO category (category_name) VALUES ('$newCategory')";
            $insertCategoryResult = mysqli_query($con, $insertCategoryQuery);

            if ($insertCategoryResult) {
                echo "Category added successfully";
            } else {
                echo "Failed to add category";
            }
        }
    }
}

if (isset($_GET['delete_category'])) {
    // Get the selected category ID from the URL
    $categoryId = $_GET['delete_category'];

    // Delete the selected category
    $deleteCategoryQuery = "DELETE FROM category WHERE id = '$categoryId'";
    $deleteCategoryResult = mysqli_query($con, $deleteCategoryQuery);

    if ($deleteCategoryResult) {
        echo "Category deleted successfully";
    } else {
        echo "Failed to delete category";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
</head>
<body>
    <div class="main">
        <h2>Manage Categories</h2>

        <!-- Add Category Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="new_category">New Category:</label>
            <input type="text" name="new_category" required>
            <input type="submit" value="Add Category" name="add_category">
        </form>

        <!-- Display error message if any -->
        <?php if (!empty($errorMsg)) { ?>
            <p style="color: red; font-size: medium;"><?php echo $errorMsg; ?></p>
        <?php } ?>

        <!-- Display existing categories in a table at the bottom -->
        <h3>Existing Categories:</h3>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
            <?php
            $getCategoriesQuery = "SELECT * FROM category";
            $getCategoriesResult = mysqli_query($con, $getCategoriesQuery);

            while ($categoryRow = mysqli_fetch_array($getCategoriesResult)) {
                echo "<tr>";
                echo "<td>" . $categoryRow['id'] . "</td>";
                echo "<td>" . $categoryRow['category_name'] . "</td>";
                echo "<td><a href='" . $_SERVER['PHP_SELF'] . "?delete_category=" . $categoryRow['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
