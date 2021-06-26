<?php include 'inc/header.php'; ?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$keyword = $_POST['keyword'];
		$search_product = $product->search_product($keyword);
	}
?>
<div id="page-search">
    <div class="container">
        <div class="page-search-inner">
            <h2 class="page-search-result-header">
                <svg viewBox="0 0 18 24" class="shopee-svg-icon icon-hint-bulb"><g transform="translate(-355 -149)"><g transform="translate(355 149)"><g fill-rule="nonzero" transform="translate(5.4 19.155556)"><path d="m1.08489412 1.77777778h5.1879153c.51164401 0 .92641344-.39796911.92641344-.88888889s-.41476943-.88888889-.92641344-.88888889h-5.1879153c-.51164402 0-.92641345.39796911-.92641345.88888889s.41476943.88888889.92641345.88888889z"></path><g transform="translate(1.9 2.666667)"><path d="m .75 1.77777778h2.1c.41421356 0 .75-.39796911.75-.88888889s-.33578644-.88888889-.75-.88888889h-2.1c-.41421356 0-.75.39796911-.75.88888889s.33578644.88888889.75.88888889z"></path></g></g><path d="m8.1 8.77777718v4.66666782c0 .4295545.40294373.7777772.9.7777772s.9-.3482227.9-.7777772v-4.66666782c0-.42955447-.40294373-.77777718-.9-.77777718s-.9.34822271-.9.77777718z" fill-rule="nonzero"></path><path d="m8.1 5.33333333v.88889432c0 .49091978.40294373.88888889.9.88888889s.9-.39796911.9-.88888889v-.88889432c0-.49091977-.40294373-.88888889-.9-.88888889s-.9.39796912-.9.88888889z" fill-rule="nonzero"></path><path d="m8.80092773 0c-4.86181776 0-8.80092773 3.97866667-8.80092773 8.88888889 0 1.69422221.47617651 3.26933331 1.295126 4.61333331l2.50316913 3.9768889c.30201078.4782222.84303623.7697778 1.42482388.7697778h7.17785139c.7077799 0 1.3618277-.368 1.7027479-.9617778l2.3252977-4.0213333c.7411308-1.2888889 1.1728395-2.7786667 1.1728395-4.37688891 0-4.91022222-3.9409628-8.88888889-8.80092777-8.88888889m0 1.77777778c3.82979317 0 6.94810087 3.18933333 6.94810087 7.11111111 0 1.24444441-.3168334 2.43022221-.9393833 3.51466671l-2.3252977 4.0213333c-.0166754.0284444-.0481735.0462222-.0833772.0462222h-7.07224026l-2.43461454-3.8648889c-.68184029-1.12-1.04128871-2.4053333-1.04128871-3.71733331 0-3.92177778 3.11645483-7.11111111 6.94810084-7.11111111"></path></g></g></svg>
                Kết quả tìm kiếm cho từ khóa '<span><?php echo $keyword; ?></span>'
            </h2>
            <div class="page-search-sort-bar">
                <label>Sắp xếp theo</label>
                <div class="page-search-sort-by-options">
                    <a href="#" class="page-search-sort-by-options__option page-search-sort-by-options__option--selected">Liên Quan</a>
                    <a href="#" class="page-search-sort-by-options__option">Mới Nhất</a>
                    <a href="#" class="page-search-sort-by-options__option">Bán Chạy</a>
                    <div class="select-with-status">
                        <div class="select-with-status__holder">
                            <span>Giá</span>
                            <span><i class="fas fa-chevron-down"></i></span>
                            <div class="select-with-status__dropdown">
                                <a href="#">Giá: Thấp đến Cao</a>
                                <a href="#">Giá: Cao đến Thấp</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-search-mini-page-controller">
                    <p><span>1</span>/100</p>
                    <a href="#" class="disabled"><i class="fas fa-chevron-left"></i></a>
                    <a href="#"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <ul class="page-search-items">
                <?php
                    if ($search_product) {
                        while ($result = $search_product->fetch_assoc()) {
                ?>
                <li class="page-search-items__item">
                    <a href="pageproduct.php?productID=<?php echo $result['productID']; ?>">
                        <div class="search-item-link">
                            <div class="search-item-image">
                                <?php
                                    $image = $productImage->get_image_by_ID($result['productID']);
                                    if ($image) {
                                ?>
                                <img src="admin/uploads/product/<?php echo $image->fetch_assoc()['productImage']; ?>" alt="image" />
                                <?php } ?>
                            </div>
                            <div class="search-item-detail">
                                <div class="search-item-detail-name">
                                    <h5><?php echo $result['productName']; ?></h5>
                                </div>
                                <div class="search-item-detail-price">
                                    <p class="price"><span>₫</span><?php echo number_format($result['productPrice']); ?></p>
                                    <p class="sole">Đã bán <?php echo number_format($result['productSold']); ?></p>
                                </div>
                            </div>
                            <div class="search-item__sale-notice">
                                <p><span>30%</span>Giảm</p>
                            </div>
                        </div>
                        <div class="search-item-link--hover">
                            Xem thông tin sản phẩm
                        </div>
                    </a>
                </li>
                <?php
                        }
                    } else {
                        echo "<script>window.location = '404.php'</script>";
                    }
                ?>
            </ul>
            <div class="page-search-page-controller"></div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>