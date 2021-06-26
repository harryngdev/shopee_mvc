<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/origin.php'; ?>
<?php include './../classes/category.php'; ?>
<?php include './../classes/product.php'; ?>
<?php
    $product = new Product();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $insertProduct = $product->insert_product($_POST);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Product</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-plus"></i>
                Add Product
            </div>
            <div class="card-form">
                <?php
                    if (isset($insertProduct)) {
                        echo $insertProduct;
                    }
                ?>
                <form action="productadd.php" method="post" class="form">
                    <div class="form-group">
                        <label for="productName" class="form-label">Name:</label>
                        <input type="text" name="productName" class="form-control" placeholder="Enter Product Name..." />
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category" class="form-control">
                            <option value="">-------- Select Category --------</option>
                            <?php
                                $category = new Category();
                                $categoryList = $category->show_category();
                                if ($categoryList) {
                                    while ($result = $categoryList->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result['categoryID']; ?>"><?php echo $result['categoryName']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="origin" class="form-label">Origin:</label>
                        <select name="origin" class="form-control">
                            <option value="">-------- Select Origin --------</option>
                            <?php
                                $origin = new origin();
                                $originList = $origin->show_origin();
                                if ($originList) {
                                    while ($result = $originList->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $result['originID']; ?>"><?php echo $result['originName']; ?></option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productDesc" class="form-label">Description:</label>
                        <textarea name="productDesc" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice" class="form-label">Price:</label>
                        <input type="text" name="productPrice" class="form-control" placeholder="Enter Price..." />
                    </div>
                    <div class="form-group">
                        <label for="productQuantity" class="form-label">Quantity:</label>
                        <input type="text" name="productQuantity" class="form-control" placeholder="Enter Quantity..." />
                    </div>
                    <div class="form-group">
                        <label for="productType" class="form-label">Product Type:</label>
                        <select name="productType" class="form-control">
                            <option value="">-------- Select Type --------</option>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>