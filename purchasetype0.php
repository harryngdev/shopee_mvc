<div class="purchase-nav-control">
    <a href="?type=0" class="active">Chờ xác nhận</a>
    <a href="?type=1">Đang giao</a>
    <a href="?type=2">Đã giao</a>
</div>
<div class="purchase-section">
    <?php
        $customerID = Session::get('customer_id');
        $getOrder = $cart->get_purchase_order($customerID, 0);
        if (!$getOrder) {
    ?>
    <div class="purchase-empty">
        <div class="purchase-empty__image"></div>
        <div class="purchase-empty__title">Chưa có đơn hàng</div>
    </div>
    <?php } else { ?>
    <div class="purchase-list">
        <?php
            while ($result = $getOrder->fetch_assoc()) {
        ?>
        <div class="purchase-item">
            <div class="purchase-item__info">
                <a href="pageproduct.php?productID=<?php echo $result['productID']; ?>">
                    <div class="details">
                        <div class="img-wrapper">
                            <img src="admin/uploads/product/<?php echo $result['productImage']; ?>" alt="img" />
                        </div>
                        <div class="details-inner">
                            <div class="name"><?php echo $result['productName']; ?></div>
                            <div class="category">Phân loại hàng: <?php echo ($product->get_product_category($result['productID'])->fetch_assoc()['categoryName']); ?></div>
                            <div class="quantity">x<?php echo number_format($result['quantity']); ?></div>
                        </div>
                    </div>
                    <div class="price">
                        <span>₫<?php echo number_format($product->get_product_price($result['productID'])->fetch_assoc()['productPrice']); ?></span>
                    </div>
                </a>
            </div>
            <div class="line">
                <div class="dot left"></div>
                <div class="dot right"></div>
            </div>
            <div class="purchase-item__total-price">
                <svg width="16" height="17" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.94 1.664s.492 5.81-1.35 9.548c0 0-.786 1.42-1.948 2.322 0 0-1.644 1.256-4.642 2.561V0s2.892 1.813 7.94 1.664zm-15.88 0C5.107 1.813 8 0 8 0v16.095c-2.998-1.305-4.642-2.56-4.642-2.56-1.162-.903-1.947-2.323-1.947-2.323C-.432 7.474.059 1.664.059 1.664z" fill="url(#paint0_linear)"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M8.073 6.905s-1.09-.414-.735-1.293c0 0 .255-.633 1.06-.348l4.84 2.55c.374-2.013.286-4.009.286-4.009-3.514.093-5.527-1.21-5.527-1.21s-2.01 1.306-5.521 1.213c0 0-.06 1.352.127 2.955l5.023 2.59s1.09.42.693 1.213c0 0-.285.572-1.09.28L2.928 8.593c.126.502.285.99.488 1.43 0 0 .456.922 1.233 1.56 0 0 1.264 1.126 3.348 1.941 2.087-.813 3.352-1.963 3.352-1.963.785-.66 1.235-1.556 1.235-1.556a6.99 6.99 0 00.252-.632L8.073 6.905z" fill="#FEFEFE"></path><defs><linearGradient id="paint0_linear" x1="8" y1="0" x2="8" y2="16.095" gradientUnits="userSpaceOnUse"><stop stop-color="#F53D2D"></stop><stop offset="1" stop-color="#F63"></stop></linearGradient></defs></svg>
                <p>Tổng số tiền <span>₫<?php echo number_format($result['price']); ?></span></p>
            </div>
            <div class="purchase-item__control">
                <div class="button">
                    <a href="pageproduct.php?productID=<?php echo $result['productID']; ?>">Thông tin sản phẩm</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>