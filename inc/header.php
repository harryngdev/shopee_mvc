<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
    include_once 'classes/slider.php';
    include_once 'classes/category.php';
    include_once 'classes/product.php';
    include_once 'classes/productimage.php';
    include_once 'classes/cart.php';
    include_once 'classes/customer.php';

    $db = new Database();
    $fm = new Format();
    $slider = new Slider();
    $category = new Category();
    $product = new Product();
    $productImage = new productImage();
    $cart = new Cart();
    $customer = new Customer();
?>
<?php
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache"); 
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
    header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopee Việt Nam | Mua và Bán Trên Ứng Dụng Di Động hoặc Website</title>
    <link 
        rel="preconnect" 
        href="https://fonts.gstatic.com" 
    />
    <link 
        rel="stylesheet" 
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" 
    />
    <link 
        rel="stylesheet" 
        href="style/fontawesome-free-5.15.3-web/css/all.min.css" 
    />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
</head>
<body>
<div class="wrapper">
    <?php
        if (isset($_GET['logout']) && !empty($_GET['logout'])) {
            $customerID = $_GET['logout'];
            // $delCart = $cart->del_all_data_cart();
            // $delCompare = $product->del_compare($customer_id);
            Session::destroy();
        }
    ?>
    <?php
        if ($_SERVER['PHP_SELF'] === "/cart.php" || $_SERVER['PHP_SELF'] === "/checkout.php") {
    ?>
    <header id="header" class="header-cart-page">
        <div class="header-inner">
            <div class="header-navbar-wrapper">
                <ul class="header-navbar-left">
                    <li><a href="#">Kênh Người Bán</a></li>
                    <li><a href="#">Tải ứng dụng</a></li>
                    <li><a href="#">Kết nối</a></li>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <ul class="header-navbar-right">
                    <li><a href="#"><i class="far fa-bell"></i>Thông Báo</a></li>
                    <li><a href="#"><i class="far fa-question-circle"></i>Hỗ Trợ</a></li>
                    <?php
                        $loginCheck = Session::get('customer_login');
                        if (!$loginCheck) {
                    ?>
                    <li><a href="register.php">Đăng Ký</a></li>
                    <li><a href="login.php">Đăng Nhập</a></li>
                    <?php } else { ?>
                    <li class="user">
                        <a href="#" class="dropdown-toggle">
                            <div class="user-avt"><img src="admin/uploads/customer/<?php echo empty(Session::get('customer_image')) ? 'customer_avt.jpg' : Session::get('customer_image'); ?>" alt="avt" /></div>
                            <span><?php echo Session::get('customer_account'); ?></span>
                        </a>
                        <div class="dropdown-menu show">
                            <a href="user.php" class="dropdown-item">Tài khoản của tôi</a>
                            <a href="purchase.php?type=0" class="dropdown-item">Đơn mua</a>
                            <a href="user.php" class="dropdown-item">Đổi mật khẩu</a>
                            <a href="?logout=<?php echo Session::get('customer_id'); ?>" class="dropdown-item" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </header>
    <?php } else { ?>
    <header id="header">
        <div class="header-inner">
            <div class="header-navbar-wrapper">
                <ul class="header-navbar-left">
                    <li><a href="#">Kênh Người Bán</a></li>
                    <li><a href="#">Trở thành Người bán Shopee</a></li>
                    <li><a href="#">Tải ứng dụng</a></li>
                    <li><a href="#">Kết nối</a></li>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <ul class="header-navbar-right">
                    <li><a href="#"><i class="far fa-bell"></i>Thông Báo</a></li>
                    <li><a href="#"><i class="far fa-question-circle"></i>Hỗ Trợ</a></li>
                    <?php
                        $loginCheck = Session::get('customer_login');
                        if (!$loginCheck) {
                    ?>
                    <li><a href="login.php">Đăng Ký</a></li>
                    <li><a href="login.php">Đăng Nhập</a></li>
                    <?php } else { ?>
                    <li class="user">
                        <a href="#" class="dropdown-toggle">
                            <div class="user-avt"><img src="admin/uploads/customer/<?php echo empty(Session::get('customer_image')) ? 'customer_avt.jpg' : Session::get('customer_image'); ?>" alt="avt" /></div>
                            <span><?php echo Session::get('customer_account'); ?></span>
                        </a>
                        <div class="dropdown-menu show">
                            <a href="user.php" class="dropdown-item">Tài khoản của tôi</a>
                            <a href="purchase.php?type=0" class="dropdown-item">Đơn mua</a>
                            <a href="user.php" class="dropdown-item">Đổi mật khẩu</a>
                            <a href="?logout=<?php echo Session::get('customer_id'); ?>" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="header-with-search">
                <a href="index.php" class="header-with-search__logo"><img src="image/logo/shopee-logo.png" alt="logo" /></a>
                <div class="header-with-search__section">
                    <div class="shopee-searchbar">
                        <form action="search.php" method="post">
                            <input type="text" name="keyword" placeholder="Mua kèm deal 0Đ" />
                            <button type="submit" name="search"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="header-with-search__keyword">
                        <?php
                            $headerCategory = $category->show_category(6);
                            if ($headerCategory) {
                                while ($result = $headerCategory->fetch_assoc()) {
                        ?>
                        <a href="pageproductbycat.php?categoryID=<?php echo $result['categoryID']; ?>"><?php echo $result['categoryName']; ?></a>
                        <?php } } ?>
                    </div>
                </div>
                <a href="cart.php" class="header-with-search__cart"><i class="fas fa-cart-plus"></i></a>
            </div>
        </div>
    </header>
    <?php } ?>