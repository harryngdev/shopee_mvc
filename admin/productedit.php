<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/origin.php'; ?>
<?php include './../classes/category.php'; ?>
<?php include './../classes/product.php'; ?>
<?php
    if (!isset($_GET['editID']) || empty($_GET['editID'])) {
        echo "<script>window.location = 'productlist.php'</script>";
    } else {
        $editID = $_GET['editID'];        
    }
    $product = new Product();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $updateProduct = $product->update_product($_POST, $editID);
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
                Edit Product
            </div>
            <div class="card-form">
                <?php
                    if (isset($updateProduct)) {
                        echo $updateProduct;
                    }
                ?>
                <?php
                    $getProduct = $product->get_product_by_ID($editID);
                    if ($getProduct) {
                        while ($result_product = $getProduct->fetch_assoc()) {
                ?>
                <form action="" method="post" class="form">
                    <div class="form-group">
                        <label for="productName" class="form-label">Name:</label>
                        <input type="text" name="productName" class="form-control" value="<?php echo $result_product['productName']; ?>" placeholder="Enter Product Name..." />
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category" class="form-control">
                            <option value="">-------- Select Category --------</option>
                            <?php
                                $category = new Category();
                                $categoryList = $category->show_category();
                                if ($categoryList) {
                                    while ($result_category = $categoryList->fetch_assoc()) {
                            ?>
                            <option
                                <?php
                                    if ($result_category['categoryID'] == $result_product['categoryID']) {
                                        echo 'selected';
                                    }
                                ?>
                                value="<?php echo $result_category['categoryID']; ?>"><?php echo $result_category['categoryName']; ?>
                            </option>
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
                                    while ($result_origin = $originList->fetch_assoc()) {
                            ?>
                            <option
                                <?php
                                    if ($result_origin['originID'] == $result_product['originID']) {
                                        echo 'selected';
                                    }
                                ?>
                                value="<?php echo $result_origin['originID']; ?>"><?php echo $result_origin['originName']; ?>
                            </option>
                            <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productDesc" class="form-label">Description:</label>
                        <textarea name="productDesc" class="form-control"><?php echo $result_product['productDesc']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice" class="form-label">Price:</label>
                        <input type="text" name="productPrice" class="form-control" value="<?php echo $result_product['productPrice']; ?>" placeholder="Enter Price..." />
                    </div>
                    <div class="form-group">
                        <label for="productType" class="form-label">Product Type:</label>
                        <select name="productType" class="form-control">
                            <option value="">-------- Select Type --------</option>
                            <?php
                                if ($result_product['productType'] == 0) {
                            ?>
                            <option selected value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php
                                } else {
                            ?>
                            <option value="0">Featured</option>
                            <option selected value="1">Non-Featured</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="productQuantity" class="form-label">Quantity:</label>
                        <input type="text" name="productQuantity" class="form-control" value="<?php echo $result_product['productQuantity']; ?>" placeholder="Enter Quantity..." />
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Save</button>
                        <a class="back" href="productlist.php#id<?php echo $editID; ?>">Back</a>
                    </div>
                </form>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>