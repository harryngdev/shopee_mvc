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
        $updateAdmin = $admin->update_admin($_POST, $_FILES['adminImage'], $adminID);
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
                Edit Profile
            </div>
            <div class="card-form">
                <?php
                    if (isset($updateAdmin)) {
                        echo $updateAdmin;
                    }
                ?>
                <?php
                    $getAdmin = $admin->get_admin_by_ID($adminID);
                    if ($getAdmin) {
                        while ($result = $getAdmin->fetch_assoc()) {
                ?>
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="adminName" class="form-label">Name:</label>
                        <input type="text" name="adminName" class="form-control" value="<?php echo $result['adminName']; ?>" placeholder="Enter Name..." />
                    </div>
                    <div class="form-group">
                        <label for="adminEmail" class="form-label">Email:</label>
                        <input type="text" name="adminEmail" class="form-control" value="<?php echo $result['adminEmail']; ?>" placeholder="Enter Email..." />
                    </div>
                    <div class="form-group">
                        <label for="adminAccount" class="form-label">Account:</label>
                        <input type="text" name="adminAccount" class="form-control" value="<?php echo $result['adminAccount']; ?>" placeholder="Enter Account..." />
                    </div>
                    <div class="form-group">
                        <label for="adminImage" class="form-label">Upload Image: </label>
                        <div class="form-image">
                            <input type="file" name="adminImage" class="form-control" />
                            <div class="category-image">
                                <input hidden name="oldImage" value="<?php echo $result['adminImage']; ?>" />
                                <img src="./uploads/admin/<?php echo empty($result['adminImage']) ? SESSION::get('adminImage') : $result['adminImage']; ?>" alt="image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Update</button>
                    </div>
                </form>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>