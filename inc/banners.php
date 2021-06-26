<section id="banners">
    <div class="container">
        <div class="banners-inner">
            <div class="banners-section">
                <div class="banners-slider">
                    <?php
                        $getSlider = $slider->show_slider();
                        if ($getSlider) {
                            while ($result = $getSlider->fetch_assoc()) {
                                if ($result['sliderType'] == 'on') {
                    ?>
                    <img src="admin/uploads/slider/<?php echo $result['sliderImage']; ?>" alt="slider" /></li>
                    <?php } } } ?>
                </div>
                <ul class="banners-list">
                    <li><a href="#"><img src="image/banner/1.jfif" alt="banner" /></a></li>
                    <li><a href="#"><img src="image/banner/2.jfif" alt="banner" /></a></li>
                </ul>
            </div>
            <div class="banners-nav">
                <a href="#"><img src="image/nav/1.gif" alt="image" />Khung Giờ Săn Sale</a>
                <a href="#"><img src="image/nav/2.png" alt="image" />Gì Cũng Rẻ - Từ 1K</a>
                <a href="#"><img src="image/nav/3.png" alt="image" />Hàng Quốc Tế</a>
                <a href="#"><img src="image/nav/4.png" alt="image" />Nạp Thẻ, Dịch Vụ & Phim</a>
                <a href="#"><img src="image/nav/5.png" alt="image" />Shopee Mart - Siêu Thị 0Đ</a>
                <a href="#"><img src="image/nav/6.png" alt="image" />Freeship Xtra</a>
                <a href="#"><img src="image/nav/7.png" alt="image" />Tech Zone - Siêu Thị Điện Tử</a>
                <a href="#"><img src="image/nav/8.png" alt="image" />Hoàn Xu Xtra</a>
                <a href="#"><img src="image/nav/9.png" alt="image" />Hàng Hiệu -50%</a>
                <a href="#"><img src="image/nav/10.png" alt="image" />Shopee Premium</a>
            </div>
        </div>
    </div>
</section>