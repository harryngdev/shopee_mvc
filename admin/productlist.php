<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include_once './../classes/origin.php'; ?>
<?php include_once './../classes/category.php'; ?>
<?php include_once './../classes/product.php'; ?>
<?php include_once './../classes/productimage.php'; ?>
<?php include_once './../helpers/format.php'; ?>
<?php
    $product = new Product();
    $fm = new Format();
    if (isset($_GET['deleteID']) && !empty($_GET['deleteID'])) {
        $deleteID = $_GET['deleteID'];
        $deleteProduct = $product->delete_product($deleteID);
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
                <i class="fas fa-table"></i>
                Product List
            </div>
            <div class="card-body">
                <?php
                    if (isset($deleteProduct)) {
                        echo $deleteProduct;
                    }
                ?>
                <div class="card-body__table">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-10 sort">Product Name</th>
                                <th class="w-10 sort">Price</th>
                                <th class="w-15">Product Image</th>
                                <th class="w-10 sort">Category</th>
                                <th class="w-5 sort">Origin</th>
                                <th class="w-20">Description</th>
                                <th class="w-5 sort">Type</th>
                                <th class="w-5 sort">Quantity</th>
                                <th class="w-5 sort">Sold</th>
                                <th class="w-10 action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $productList = $product->show_product();
                                if ($productList) {
                                    $id = 1;
                                    while ($result = $productList->fetch_assoc()) {
                            ?>
                            <tr id="id<?php echo $result['productID']; ?>">
                                <td class="w-5"><?php echo $id++; ?></td>
                                <td class="w-10"><?php echo $fm->textShorten($result['productName'], 70); ?></td>
                                <td class="w-10"><?php echo number_format($result['productPrice']); ?></td>
                                <td class="w-15 image">
                                    <?php
                                        $productImage = new productImage();
                                        $getImage = $productImage->get_image_by_ID($result['productID']);
                                        if ($getImage) {
                                            $resultImage = $getImage->fetch_assoc();
                                    ?>
                                    <img src="./uploads/product/<?php echo $resultImage['productImage']; ?>" alt="image" />
                                    <a href="productuploadimage.php?productID=<?php echo $result['productID']; ?>">More Image</a>
                                    <?php } else { ?>
                                    <a href="productuploadimage.php?productID=<?php echo $result['productID']; ?>">Upload Image</a>
                                    <?php } ?>
                                </td>
                                <td class="w-10"><?php echo $result['categoryName']; ?></td>
                                <td class="w-5"><?php echo $result['originName']; ?></td>
                                <td class="w-20"><?php echo $fm->textShorten($result['productDesc'], 150); ?></td>
                                <td class="w-5"><?php
                                    if (!$result['productType']) {
                                        echo "Feathered";
                                    } else {
                                        echo "Non-Feathered";
                                    }
                                ?></td>
                                <td class="w-5"><?php echo number_format($result['productQuantity']); ?></td>
                                <td class="w-5"><?php echo number_format($result['productSold']); ?></td>
                                <td class="w-10 control">
                                    <a class="b-r" href="productedit.php?editID=<?php echo $result['productID']; ?>">Edit</a>
                                    <a class="b-l" onclick="return confirm('Are you want to delete?')" href="?deleteID=<?php echo $result['productID']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="w-5">ID</th>
                                <th class="w-10">Product Name</th>
                                <th class="w-10">Price</th>
                                <th class="w-15">Product Image</th>
                                <th class="w-10">Category</th>
                                <th class="w-5">Origin</th>
                                <th class="w-20">Description</th>
                                <th class="w-5">Type</th>
                                <th class="w-5">Quantity</th>
                                <th class="w-5">Sold</th>
                                <th class="w-10">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>