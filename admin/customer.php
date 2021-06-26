<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/customer.php'; ?>
<?php
    if (!isset($_GET['customerID']) || empty($_GET['customerID'])) {
        echo "<script>window.location = 'inbox.php'</script>";
    } else {
        $customerID = $_GET['customerID'];
    }
    $customer = new Customer();
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Customer</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-plus"></i>
                Details
            </div>
            <div class="card-form">
                <?php
                    $getCustomer = $customer->show_details_customer($customerID);
                    if ($getCustomer) {
                        while ($result = $getCustomer->fetch_assoc()) {
                ?>
                <form action="" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="customerName" class="form-label">Name:</label>
                        <input readonly type="text" name="customerName" class="form-control" value="<?php echo $result['customerName']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="customerAccount" class="form-label">Account:</label>
                        <input readonly type="text" name="customerAccount" class="form-control" value="<?php echo $result['customerAccount']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="customerEmail" class="form-label">Email:</label>
                        <input readonly type="text" name="customerEmail" class="form-control" value="<?php echo $result['customerEmail']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="customerPhone" class="form-label">Phone:</label>
                        <input readonly type="text" name="customerPhone" class="form-control" value="<?php echo $result['customerPhone']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="customerAddress" class="form-label">Address:</label>
                        <textarea readonly name="customerAddress" class="form-control"><?php echo $result['customerAddress']; ?></textarea>
                    </div>
                </form>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>