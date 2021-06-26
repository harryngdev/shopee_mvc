<section id="popular">
    <div class="container">
        <div class="popular-banner">
            <img src="image/banner/4a.jfif" alt="banner" />
        </div>
        <div class="popular-section">
            <div class="popular-section-wrapper">
                <div class="popular-product">
                    <div class="popular-product__title">
                        <h3>Sản phẩm bán chạy</h3>
                        <a href="pagebestseller.php">Xem Thêm <span>></span></a>
                    </div>
                    <div class="popular-product__list">
                        <?php
                            $bestSellerProduct = $product->best_seller_product(3);
                            if ($bestSellerProduct) {
                                while ($result = $bestSellerProduct->fetch_assoc()) {
                        ?>
                        <a href="pageproduct.php?productID=<?php echo $result['productID']; ?>" class="popular-product__item">
                            <div class="popular-product__item-wrapper">
                                <div class="img-wrapper">
                                    <?php
                                        $bestSellerImage = $productImage->get_image_by_ID($result['productID']);
                                        if ($bestSellerImage) {
                                    ?>
                                    <img src="admin/uploads/product/<?php echo $bestSellerImage->fetch_assoc()['productImage']; ?>" alt="image" />
                                    <?php } ?>
                                </div>    
                                <p>₫<?php echo number_format($result['productPrice']); ?></p>
                            </div>
                            <div class="popular-product__sale-notice">
                                <p><span>30%</span>Giảm</p>
                            </div>
                        </a>
                        <?php } } else { ?>
                        <p class="none-item">Hiện Không Có Sản Phẩm Nổi Bật</p>
                        <?php } ?>
                    </div>
                </div>
                <div class="popular-brand">
                    <div class="popular-brand__title">
                        <h3>sản phẩm nổi bật</h3>
                        <a href="pagepopular.php">Xem Thêm <span>></span></a>
                    </div>
                    <div class="popular-brand__list">
                        <?php
                            $featheredProduct = $product->show_feathered_product(3);
                            if ($featheredProduct) {
                                while ($result = $featheredProduct->fetch_assoc()) {
                        ?>
                        <a href="pageproduct.php?productID=<?php echo $result['productID']; ?>" class="popular-brand__item">
                            <div class="popular-brand__item-wrapper">
                                <div class="img-wrapper">
                                    <?php
                                        $featheredImage = $productImage->get_image_by_ID($result['productID']);
                                        if ($featheredImage) {
                                    ?>
                                    <img src="admin/uploads/product/<?php echo $featheredImage->fetch_assoc()['productImage']; ?>" alt="image" />
                                    <?php } ?>
                                </div>
                                <p><?php echo $result['productName']; ?></p>
                            </div>
                        </a>
                        <?php } } else { ?>
                        <p class="none-item">Hiện Không Có Sản Phẩm Nổi Bật</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-banner">
            <img src="image/banner/4b.jfif" alt="banner" />
        </div>
    </div>
</section>