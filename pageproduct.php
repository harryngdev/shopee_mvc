<?php include './inc/header.php'; ?>
<?php
    if (!isset($_GET['productID']) || empty($_GET['productID'])) {
        echo "<script>window.location = 'index.php'</script>";
    } else {
        $checkProduct = $product->get_product_by_ID($_GET['productID']);
        if ($checkProduct) {
            $productID = $_GET['productID'];
        } else {
            echo "<script>window.location = '404.php'</script>";
        }
    }

    $customerID = Session::get('customer_id');
    if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['addcart'])) {
        $quantity = $_POST['quantity'];
        $cart->add_to_cart($productID, $quantity);
    }
    if (isset($_GET['action']) && $_GET['action'] == 'like') {
        $product->insert_wishlist($productID, $customerID);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'unlike') {
        $product->delete_wishlist($productID, $customerID);
    }
    if ($getLike = $product->get_product_like($productID)) {
        $resultLike = $getLike->fetch_assoc()['getLike'];
    } else {
        $resultLike = 0;
    }
?>
<div id="page-product">
    <div class="container">
        <?php
            $getProduct = $product->get_product_by_ID($productID);
            if ($getProduct) {
                $resultProduct = $getProduct->fetch_assoc();
        ?>
        <div class="page-product__breadcrumb">
            <a href="index.php" title="Shopee">Shopee</a>
            <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
            <a href="pageproductbycat.php?categoryID=<?php echo $resultProduct['categoryID']; ?>" title="<?php echo $resultProduct['categoryName']; ?>"><?php echo $resultProduct['categoryName']; ?></a>
            <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
            <a href="pageproductbyori.php?originID=<?php echo $resultProduct['originID']; ?>" title="<?php echo $resultProduct['originName']; ?>"><?php echo $resultProduct['originName']; ?></a>
            <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
            <a href="pageproduct.php?productID=<?php echo $resultProduct['productID']; ?>" title="<?php echo $resultProduct['productName']; ?>"><?php echo $resultProduct['productName']; ?></a>
        </div>
        <div class="page-product__briefing">
            <div class="page-product__briefing-left">
                <div class="briefing-slider">
                    <?php
                        $getPdImage = $productImage->get_image_by_ID($productID);
                        if ($getPdImage) {
                            $imageArr = array();
                            $index = 0;
                            while ($resultPdImage = $getPdImage->fetch_assoc()) {
                                $imageArr[$index] = $resultPdImage['productImage'];
                    ?>
                    <div class="briefing-slider-item">
                        <img src="./admin/uploads/product/<?php echo $imageArr[$index++]; ?>" alt="image" />
                    </div>
                    <?php } ?>
                </div>
                <div class="briefing-slider-nav">
                    <?php foreach ($imageArr as $value) { ?>
                    <div class="briefing-slider-item">
                        <img src="./admin/uploads/product/<?php echo $value; ?>" alt="image" />
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="briefing-share">
                    <div class="briefing-share--item">
                        <p>Chia sẻ:</p>
                        <a href="#"><div class="briefing-share--item-bg briefing-share--item-fm"></div></a>
                        <a href="#"><div class="briefing-share--item-bg briefing-share--item-fb"></div></a>
                        <a href="#"><div class="briefing-share--item-bg briefing-share--item-pinterest"></div></a>
                        <a href="#"><div class="briefing-share--item-bg briefing-share--item-twitter"></div></a>
                    </div>
                    <div class="briefing-share--item">
                        <?php if ($product->check_like($productID, $customerID)) { ?>
                        <a href="?productID=<?php echo $productID; ?>&action=unlike">
                            <svg width="24" height="20" class="ELoIiZ">
                                <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="#FF424F" fill-rule="evenodd" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <?php } else { ?>
                        <a href="?productID=<?php echo $productID; ?>&action=like">
                            <svg width="24" height="20" class="ELoIiZ">
                                <path d="M19.469 1.262c-5.284-1.53-7.47 4.142-7.47 4.142S9.815-.269 4.532 1.262C-1.937 3.138.44 13.832 12 19.333c11.559-5.501 13.938-16.195 7.469-18.07z" stroke="#FF424F" stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                        <?php } ?>
                        <p><?php echo number_format($resultLike); ?></p>
                    </div>
                </div>
            </div>
            <div class="page-product__briefing-right">
                <div class="product-name">
                    <div class="product-name--favorite">Yêu Thích</div>
                    <span><?php echo $resultProduct['productName']; ?></span>
                </div>
                <div class="product-rate">
                    <p>Chưa Có Đánh Giá</p>
                    <p><span><?php echo number_format($resultProduct['productSold']); ?></span> Đã Bán</p>
                </div>
                <div class="product-price">
                    <p>₫<?php echo number_format($resultProduct['productPrice']); ?></p>
                </div>
                <div class="product-voucher">
                    <label>Mã Giảm Giá Của Shop</label>
                    <ul>
                        <li>10% giảm</li>
                        <li>Giảm ₫5k</li>
                        <li>10% Giảm</li>
                        <li>10% giảm</li>
                    </ul>
                </div>
                <div class="product-transport">
                    <label>Vận Chuyển</label>
                    <div class="product-transport-details">
                        <p><img src="image/button/free-ship.png" alt="image" />Miễn Phí Vận Chuyển</p>
                        <p>Miễn Phí Vận Chuyển khi đơn đạt giá trị tối thiểu</p>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="product-quantity">
                        <label>Số Lượng</label>
                        <div class="product-quantity-form">
                            <div class="product-quantity-control">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); return false;">-</button>
                                <input type="number" name="quantity" value="1" min="1" max="<?php echo $resultProduct['productQuantity']; ?>" />
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp(); return false;">+</button>
                            </div>
                            <p><?php echo $resultProduct['productQuantity']; ?> sản phẩm có sẵn</p>
                        </div>
                    </div>
                    <div class="product-add">
                        <button type="submit" name="addcart"><i class="fas fa-cart-plus"></i>Thêm Vào Giỏ Hàng</button>
                        <button type="submit" name="addcart">Mua Ngay</button>
                    </div>
                </form>
                <div class="product-pcmall">
                    <a href="">
                        <img src="image/button/pcmall.png" alt="image" />
                        <span>Shopee Đảm Bảo</span>
                        <span>3 Ngày Trả Hàng / Hoàn Tiền</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="page-product__details">
            <div class="page-product__details-section">
                <div class="details-title">Chi Tiết Sản Phẩm</div>
                <div class="details-inner">
                    <div class="details-item">
                        <label>Danh Mục</label>
                        <div class="details-item--link">
                        <a href="index.php" title="Shopee">Shopee</a>
                        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
                        <a href="pageproductbycat.php?categoryID=<?php echo $resultProduct['categoryID']; ?>" title="<?php echo $resultProduct['categoryName']; ?>"><?php echo $resultProduct['categoryName']; ?></a>
                        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
                        <a href="pageproductbyori.php?originID=<?php echo $resultProduct['originID']; ?>" title="<?php echo $resultProduct['originName']; ?>"><?php echo $resultProduct['originName']; ?></a>
                        <svg enable-background="new 0 0 11 11" viewBox="0 0 11 11" x="0" y="0" class="bQfo7W"><path d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z"></path></svg>
                        <a href="pageproduct.php?productID=<?php echo $resultProduct['productID']; ?>" title="<?php echo $resultProduct['productName']; ?>"><?php echo $resultProduct['productName']; ?></a>
                        </div>
                    </div>
                    <div class="details-item">
                        <label>Thương hiệu</label>
                        <p>No Brand</p>
                    </div>
                    <div class="details-item">
                        <label>Xuất xứ</label>
                        <p><?php echo $resultProduct['originName']; ?></p>
                    </div>
                    <div class="details-item">
                        <label>Kho hàng</label>
                        <p><?php echo $resultProduct['productQuantity']; ?></p>
                    </div>
                    <div class="details-item">
                        <label>Gửi Từ</label>
                        <p>Quận Tân Bình, TP. Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
            <div class="page-product__details-section">
                <div class="details-title">Mô tả sản phẩm</div>
                <div class="details-inner">
                    <div class="details-area">
                        <span><?php echo $resultProduct['productDesc']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-product__comment">
            <div class="comment-title">Đánh giá sản phẩm</div>
            <div class="comment-inner">
                <div class="comment-empty">
                    <img src="image/button/comment.png" alt="image" />
                    <p>Chưa có đánh giá</p>
                </div>
            </div>
        </div>
        <div class="page-product__similar">
            <div class="similar-title">Sản phẩm tương tự</div>
            <ul class="similar-list">
                <?php
                    $similarProduct = $product->similar_product($resultProduct['categoryID'], $resultProduct['productID']);
                    if ($similarProduct) {
                        while ($resultSimilar = $similarProduct->fetch_assoc()) {
                ?>
                <li class="similar-item">
                    <a href="pageproduct.php?productID=<?php echo $resultSimilar['productID']; ?>">
                        <div class="similar-item--link">
                            <div class="similar-item--image">
                                <?php
                                    $getSimilarImage = $productImage->get_image_by_ID($resultSimilar['productID']);
                                    if ($getSimilarImage) {
                                ?>
                                <img src="./admin/uploads/product/<?php echo $getSimilarImage->fetch_assoc()['productImage']; ?>" alt="image" />
                                <?php } ?>
                            </div>
                            <div class="similar-item--detail">
                                <div class="similar-item--detail-name">
                                    <h5><?php echo $resultSimilar['productName']; ?></h5>
                                </div>
                                <div class="similar-item--detail-price">
                                    <p class="price"><span>₫</span><?php echo number_format($resultSimilar['productPrice']); ?></p>
                                    <p class="sole">Đã bán <?php echo number_format($resultSimilar['productSold']); ?></p>
                                </div>
                            </div>
                            <div class="similar-item--notice">
                                <p><span>30%</span>Giảm</p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php } } else { echo '<p class="none-similar-item">Hiện Không có sản phẩm tương tự</p>'; } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php include './inc/footer.php'; ?>