<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/category.php'; ?>
<?php
    if (!isset($_GET['editID']) || empty($_GET['editID'])) {
        echo "<script>window.location = 'categorylist.php'</script>";
    } else {
        $editID = $_GET['editID'];        
    }
    $category = new Category();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $updateCategory = $category->update_category($_POST, $_FILES['categoryImage'], $editID);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Category</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-plus"></i>
                Edit Category
            </div>
            <div class="card-form">
                <?php
                    if (isset($updateCategory)) {
                        echo $updateCategory;
                    }
                ?>
                <?php
                    $getCategoryName = $category->get_category_by_ID($editID);
                    if ($getCategoryName) {
                        while ($result = $getCategoryName->fetch_assoc()) {
                ?>
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="categoryName" class="form-label">Name:</label>
                        <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name..." value="<?php echo $result['categoryName']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="categoryImage" class="form-label">Upload Image:</label>
                        <div class="form-image">
                            <input type="file" name="categoryImage" class="form-control" />
                            <div class="category-image">
                                <input hidden name="oldImage" value="<?php echo $result['categoryImage']; ?>" />
                                <img src="./uploads/category/<?php echo $result['categoryImage']; ?>" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Update</button>
                        <a class="back" href="categorylist.php#id<?php echo $editID; ?>">Back</a>
                    </div>
                </form>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>