<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/productimage.php'; ?>
<?php
    if (!isset($_GET['productID']) || empty($_GET['productID'])) {
        echo "<script>window.location = 'productlist.php?demoo=1231'</script>";
    } else {
        $productID = $_GET['productID'];        
    }
    $productImage = new productImage();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $uploadImage = $productImage->upload_product_image($_FILES['productImage'], $productID);
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
                Upload Image Product
            </div>
            <div class="card-form">
                <?php
                    if (isset($uploadImage)) {
                        echo $uploadImage;
                    }
                ?>
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="productImage" class="form-label">Upload Image</label>
                        <input multiple type="file" name="productImage[]" class="form-control" >
                    </div>
                    <div class="product_image-list">
                        <?php 
                            $showImage = $productImage->get_image_by_ID($productID);
                            if ($showImage) {
                                while ($result = $showImage->fetch_assoc()) {
                        ?>
                        <div class="product_image-item">
                            <div class="img-wrapper">
                                <img src="./uploads/product/<?php echo $result['productImage']; ?>" alt="image" />
                            </div>
                            <a href="productdeleteimage.php?productID=<?php echo $productID; ?>&imageID=<?php echo $result['imageID']; ?>&url=<?php echo urlencode($result['productImage']); ?>">Xóa</a>
                        </div>
                        <?php } } ?>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Upload</button>
                        <a class="back" href="productlist.php#id<?php echo $productID; ?>">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>