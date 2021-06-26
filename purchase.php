<?php include './inc/header.php'; ?>
<?php
	$loginCheck = Session::get('customer_login');
	if (!$loginCheck) {
		header('location: login.php');
	}
?>
<?php
    $cart = new Cart();
    if (isset($_GET['confirmID']) && !empty($_GET['confirmID'])) {
        $id = $_GET['confirmID'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$cart->shifted_confirm($id, $time, $price);
    }
?>
<?php
    if (isset($_GET['notice']) && $_GET['notice'] == 'true') {
        echo '<script type="text/javascript">alert("Xác nhận thành công");</script>';
    } elseif (isset($_GET['notice']) && $_GET['notice'] == 'false') {
        echo '<script type="text/javascript">alert("Xác nhận thành công");</script>';
    } 
    // elseif (isset($_GET['action']) && $_GET['action'] == 'false') {
    //     echo '<script type="text/javascript">alert("Cập nhật không thành công");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'failed') {
    //     echo '<script type="text/javascript">alert("Không thể cập nhật Avatar");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'oldpwfailed') {
    //     echo '<script type="text/javascript">alert("Mật khẩu cũ không chính xác");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'cfpwfailed') {
    //     echo '<script type="text/javascript">alert("Mật khẩu mới không trùng khớp");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'pwtrue') {
    //     echo '<script type="text/javascript">alert("Thay đổi mật khẩu thành công");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'pwfailed') {
    //     echo '<script type="text/javascript">alert("Thay đổi mật khẩu không thành công");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // } elseif (isset($_GET['action']) && $_GET['action'] == 'emptyaddress') {
    //     echo '<script type="text/javascript">alert("Vui lòng thêm địa chỉ");</script>';
    //     echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    // }
?>
<div id="user-page">
    <div class="container">
        <div class="user-page-wrapper">
            <div class="user-page-sidebar">
                <div class="user-page-sidebar__brief">
                    <a href="#" class="userpage-brief__avt"><img src="./admin/uploads/customer/<?php echo empty(Session::get('customer_image')) ? 'customer_avt.jpg' : Session::get('customer_image'); ?>" alt="avt" /></a>
                    <div class="userpage-brief__right">
                        <h3><?php echo Session::get('customer_name'); ?></h3>
                        <span><i class="fas fa-pen"></i>Sửa Hồ Sơ</span>
                    </div>
                </div>
                <div class="user-page-sidebar__menu">
                    <a href="user.php" class="user-page-sidebar__menu-entry">
                        <div class="stardust-dropdown-header--icon"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot"><g><circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle><path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round" stroke-miterlimit="10"></path></g></svg></div>
                        <p>Tài Khoản Của Tôi</p>
                    </a>
                    <a href="purchase.php" class="user-page-sidebar__menu-entry active">
                        <div class="user-page-sidebar__menu-entry--icon"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon " style="fill: rgb(255, 255, 255);"><g><rect fill="none" height="10" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" width="8" x="4.5" y="1.5"></rect><polyline fill="none" points="2.5 1.5 2.5 13.5 12.5 13.5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></polyline><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6.5" x2="10.5" y1="4" y2="4"></line><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6.5" x2="10.5" y1="6.5" y2="6.5"></line><line fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="6.5" x2="10.5" y1="9" y2="9"></line></g></svg></div>
                        <p>Đơn Mua</p>
                    </a>
                    <a href="#" class="user-page-sidebar__menu-entry">
                        <div class="user-page-sidebar__menu-entry--icon"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon "><g><path d="m12 10.2 1.5 2h-12l1.5-2v-7.4c0-.5.5-1 1-1h7c .6 0 1 .5 1 1z" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"></path><path d="m6 2c0-.8.7-1.5 1.5-1.5s1.5.7 1.5 1.5" fill="none" stroke-miterlimit="10"></path><path d="m5.8 13.5c.4.6 1 1 1.8 1s1.4-.4 1.8-1z"></path></g></svg></div>
                        <p>Thông Báo</p>
                    </a>
                    <a href="#" class="user-page-sidebar__menu-entry">
                        <div class="user-page-sidebar__menu-entry--icon"><svg height="11" viewBox="0 0 12 11" width="12" class="shopee-svg-icon user-page-sidebar-icon voucher-wallet-icon icon-voucher"><g fill="none" fill-rule="evenodd" transform=""><path d="m1.24401059 7.40822892c-.18616985.27925478-.2855145.60736785-.2855145.94299033v.69678422c0 .33137085.26862915.6.6.6h8.88300781c.3313709 0 .6-.26862915.6-.6v-7.6515625c0-.33137085-.2686291-.6-.6-.6h-8.88300781c-.33137085 0-.6.26862915-.6.6v.69678422c0 .33562248.09934465.66373556.2855145.94299034l.52041449.78062172c.2774581.41618716.42551633.90519026.42551633 1.40538497 0 .50019472-.14805823.98919781-.42551633 1.40538497z" stroke="#fff"></path><path d="m5.64815848 3.46301463h3.69433594v.85253907h-3.69433594zm0 1.53930664h3.69433594v.85253907h-3.69433594zm0 1.53930664h3.69433594v.85253907h-3.69433594zm-2.02308873-3.07861328h.85253907v.85253907h-.85253907zm0 1.53930664h.85253907v.85253907h-.85253907zm0 1.53930664h.85253907v.85253907h-.85253907z" fill="#fff"></path></g></svg></div>
                        <p>Ví Voucher</p>
                    </a>
                    <a href="#" class="user-page-sidebar__menu-entry">
                        <div class="user-page-sidebar__menu-entry--icon"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon "><path d="m7.5 1c3.6 0 6.5 2.9 6.5 6.5s-2.9 6.5-6.5 6.5-6.5-2.9-6.5-6.5 2.9-6.5 6.5-6.5m0-1c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5 7.5-3.4 7.5-7.5-3.4-7.5-7.5-7.5z" stroke="none"></path><path d="m9.7 3.7c-1.2-.8-2.9-1-4-.1-1.2 1-1.1 2.5 0 3.4.8.6 1.7.7 2.6 1.2 1.2.7 1.7 2.2 0 2.7-1.1.3-2.2-.1-3.1-.8-.5-.4-1 .5-.5.9 1.2.8 2.7 1.3 4.1.8 1.2-.4 2-1.7 1.5-2.9-.4-1.1-1.7-1.6-2.7-2-.4-.1-.7-.2-1-.5-1.2-.9-.6-2.4.9-2.4.6 0 1.2.2 1.7.6.5.3 1-.5.5-.9z" stroke="none"></path></svg></div>
                        <p>Shopee Xu</p>
                    </a>
                </div>
            </div>
            <div class="user-page-section">
                <div class="purchase-wrapper">
                    <?php
                        if (isset($_GET['type']) && $_GET['type'] == '0') {
                            include 'purchasetype0.php';
                        } elseif (isset($_GET['type']) && $_GET['type'] == '1') {
                            include 'purchasetype1.php';
                        } elseif (isset($_GET['type']) && $_GET['type'] == '2') {
                            include 'purchasetype2.php';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>