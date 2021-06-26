<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/admin.php'; ?>
<?php
    if (!isset($_GET['adminID']) || empty($_GET['adminID'])) {
        echo "<script>window.location = 'index.php'</script>";
    } else {
        $adminID = $_GET['adminID'];        
    }
    $admin = new Admin();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $changePassword = $admin->change_password($_POST, $adminID);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Admin Profile</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-plus"></i>
                Change Password
            </div>
            <div class="card-form">
                <?php
                    if (isset($changePassword)) {
                        echo $changePassword;
                    }
                ?>
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="oldPass" class="form-label">Old Password:</label>
                        <input type="text" name="oldPass" class="form-control" placeholder="Enter Old Password..." />
                    </div>
                    <div class="form-group">
                        <label for="newPass" class="form-label">New Password:</label>
                        <input type="password" name="newPass" class="form-control" placeholder="Enter New Password..." />
                    </div>
                    <div class="form-group">
                        <label for="confirmPass" class="form-label">Confirm New Password:</label>
                        <input type="password" name="confirmPass" class="form-control" placeholder="Confirm New Password..." />
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>