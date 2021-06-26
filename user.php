<?php include 'inc/header.php'; ?>
<?php
	$loginCheck = Session::get('customer_login');
	if (!$loginCheck) {
		header('location: login.php');
	}
?>
<?php
    if (isset($_GET['action']) && $_GET['action'] == 'empty') {
        echo '<script type="text/javascript">alert("Không được để ô trống");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'true') {
        echo '<script type="text/javascript">alert("Cập nhật thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'false') {
        echo '<script type="text/javascript">alert("Cập nhật không thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'failed') {
        echo '<script type="text/javascript">alert("Không thể cập nhật Avatar");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'oldpwfailed') {
        echo '<script type="text/javascript">alert("Mật khẩu cũ không chính xác");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'cfpwfailed') {
        echo '<script type="text/javascript">alert("Mật khẩu mới không trùng khớp");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'pwtrue') {
        echo '<script type="text/javascript">alert("Thay đổi mật khẩu thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'pwfailed') {
        echo '<script type="text/javascript">alert("Thay đổi mật khẩu không thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'emptyaddress') {
        echo '<script type="text/javascript">alert("Vui lòng thêm địa chỉ");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=?id=live" />';
    }
?>
<?php
    if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['save'])) {
        $customerID = Session::get('customer_id');
		$updateCustomer = $customer->update_customer($_POST, $_FILES['customerImage'], $customerID);
	} elseif (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['changepw'])) {
        $customerID = Session::get('customer_id');
		$changePassword = $customer->change_password($_POST, $customerID);
	}
?>
<div id="user-page">
    <div class="container">
        <div class="user-page-wrapper">
            <div class="user-page-sidebar">
                <div class="user-page-sidebar__brief">
                    <a href="#" class="userpage-brief__avt"><img src="admin/uploads/customer/<?php echo empty(Session::get('customer_image')) ? 'customer_avt.jpg' : Session::get('customer_image'); ?>" alt="avt" /></a>
                    <div class="userpage-brief__right">
                        <h3><?php echo Session::get('customer_name'); ?></h3>
                        <span><i class="fas fa-pen"></i>Sửa Hồ Sơ</span>
                    </div>
                </div>
                <div class="user-page-sidebar__menu">
                    <div class="stardust-dropdown">
                        <div class="stardust-dropdown-header">
                            <div class="stardust-dropdown-header--icon"><svg enable-background="new 0 0 15 15" viewBox="0 0 15 15" x="0" y="0" class="shopee-svg-icon user-page-sidebar-icon icon-headshot"><g><circle cx="7.5" cy="4.5" fill="none" r="3.8" stroke-miterlimit="10"></circle><path d="m1.5 14.2c0-3.3 2.7-6 6-6s6 2.7 6 6" fill="none" stroke-linecap="round" stroke-miterlimit="10"></path></g></svg></div>
                            <p>Tài Khoản Của Tôi</p>
                        </div>
                        <div class="stardust-dropdown-body">
                            <a href="#" class="active" id="my-account-profile-link">Hồ Sơ</a>
                            <a href="#" id="change-password-link">Đổi Mật Khẩu</a>
                        </div>
                    </div>
                    <a href="purchase.php?type=0" class="user-page-sidebar__menu-entry">
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
                <div id="my-account-profile" class="my-account-section">
                    <div class="my-account-section__header">
                        <h2>Hồ Sơ Của Tôi</h2>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="my-account-profile">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                                $customerID = Session::get('customer_id');
                                $getCustomer = $customer->show_details_customer($customerID);
                                if ($getCustomer) {
                                    $result = $getCustomer->fetch_assoc();
                            ?>
                            <div class="my-account-profile__left">
                                <div class="input-with-label">
                                    <label for="customerAccount" class="input-with-label__label">Tên Đăng Nhập</label>
                                    <div class="input-with-label__content"><?php echo $result['customerAccount']; ?></div>
                                </div>
                                <div class="input-with-label">
                                    <label for="customerName" class="input-with-label__label">Tên</label>
                                    <div class="input-with-label__input"><input type="text" name="customerName" value="<?php echo $result['customerName']; ?>" placeholder="Nhập Họ và Tên..." /></div>
                                </div>
                                <div class="input-with-label">
                                    <label for="customerEmail" class="input-with-label__label">Email</label>
                                    <div class="input-with-label__input"><input type="text" name="customerEmail" value="<?php echo $result['customerEmail']; ?>" placeholder="Nhập Email..." /></div>
                                </div>
                                <div class="input-with-label">
                                    <label for="customerPhone" class="input-with-label__label">Số Điện Thoại</label>
                                    <div class="input-with-label__input"><input type="text" name="customerPhone" value="<?php echo $result['customerPhone']; ?>" placeholder="Nhập Số Điện Thoại..." /></div>
                                </div>
                                <div class="input-with-label">
                                    <label for="customerAddress" class="input-with-label__label">Địa Chỉ</label>
                                    <div class="input-with-label__area">
                                        <textarea name="customerAddress"><?php echo $result['customerAddress']; ?></textarea>    
                                    </div>
                                </div>
                                <div class="my-account-page__submit">
                                    <button type="submit" name="save">Lưu</button>
                                </div>
                            </div>
                            <div class="my-account-profile__right">
                                <div class="avatar-uploader">
                                    <div class="avatar-uploader__avatar">
                                        <img src="admin/uploads/customer/<?php echo empty(Session::get('customer_image')) ? 'customer_avt.jpg' : Session::get('customer_image'); ?>" alt="avt" />
                                    </div>
                                    <div class="avatar-uploader__file-input">
                                        <input type="file" name="customerImage" id="" />
                                        <label for="customerImage">Chọn Ảnh</label>
                                    </div>
                                    <div class="avatar-uploader__notice">
                                        <p>Dụng lượng file tối đa 1 MB</p>
                                        <p>Định dạng: .JPEG, .PNG</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <div id="change-password" class="change-password">
                    <div class="change-password__header">
                        <h2>Đổi Mật Khẩu</h2>
                        <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
                    </div>
                    <div class="change-password__section">
                        <form action="" method="post">
                            <div class="input-with-label">
                                <label for="oldPass" class="input-with-label__label">Mật Khẩu Hiện Tại</label>
                                <div class="input-with-label__input"><input type="text" name="oldPass" /></div>
                            </div>
                            <div class="input-with-label">
                                <label for="newPass" class="input-with-label__label">Mật Khẩu Mới</label>
                                <div class="input-with-label__input"><input type="password" name="newPass" /></div>
                            </div>
                            <div class="input-with-label">
                                <label for="confirmPass" class="input-with-label__label">Xác Nhận Mật Khẩu</label>
                                <div class="input-with-label__input"><input type="password" name="confirmPass" /></div>
                            </div>
                            <div class="change-password__submit">
                                <button type="submit" name="changepw">Xác Nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>