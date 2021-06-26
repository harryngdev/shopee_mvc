<?php include './../classes/productimage.php'; ?>
<?php
    if (isset($_GET['productID']) && !empty($_GET['productID']) && isset($_GET['imageID']) && !empty($_GET['imageID']) && isset($_GET['url']) && !empty($_GET['url'])) {
        $productID = $_GET['productID'];
        $imageID = $_GET['imageID'];
        $url = $_GET['url'];
        $productImage = new productImage();
        $deleteImage = $productImage->delete_product_image($imageID, $url);
    }
    header('location: productuploadimage.php?productID='.$productID);
?>