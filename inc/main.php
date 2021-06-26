<main id="main">
    <div class="container">
        <div class="main-title">
            <h3>Gợi ý hôm nay</h3>
            <div class="main-title-banner">
                <img src="image/banner/8.png" alt="banner" />
            </div>
        </div>
        <div class="main-list">
            <div class="main-list-wrapper">
                <?php 
                    $getProduct = $product->show_product_random();
                    if ($getProduct) {
                        while ($resultProduct = $getProduct->fetch_assoc()) {
                ?>
                <div class="main-item">
                    <a href="pageproduct.php?productID=<?php echo $resultProduct['productID']; ?>">
                        <div class="main-item-link">
                            <div class="main-item-link--image">
                                <?php
                                    $getPdImage = $productImage->get_image_by_ID($resultProduct['productID']);
                                    if ($getPdImage) {
                                ?>
                                <img src="admin/uploads/product/<?php echo $getPdImage->fetch_assoc()['productImage']; ?>" alt="image" />
                                <?php } ?>
                            </div>
                            <div class="main-item-link--detail">
                                <div class="main-item-link--detail-name">
                                    <h5><?php echo $resultProduct['productName']; ?></h5>
                                </div>
                                <div class="main-item-link--detail-price">
                                    <p class="price"><span>₫</span><?php echo number_format($resultProduct['productPrice']).'2212312312'; ?></p>
                                    <p class="sole">Đã bán <?php echo number_format($resultProduct['productSold']); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="main-item-link--hover">
                            Xem thông tin sản phẩm
                        </div>
                    </a>
                </div>
                <?php } } ?>
            </div>
            <div class="btn btn-more">
                <a href="#">Xem Thêm</a>
            </div>
        </div>
    </div>
</main>