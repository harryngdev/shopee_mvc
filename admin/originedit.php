<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/origin.php'; ?>
<?php
    if (!isset($_GET['editID']) || empty($_GET['editID'])) {
        echo "<script>window.location = 'originlist.php'</script>";
    } else {
        $editID = $_GET['editID'];        
    }
    $origin = new Origin();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $updateOrigin = $origin->update_origin($_POST, $editID);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Origin</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-folder-plus"></i>
                Edit Origin
            </div>
            <div class="card-form">
                <?php
                    if (isset($updateOrigin)) {
                        echo $updateOrigin;
                    }
                ?>
                <?php
                    $getOriginName = $origin->get_origin_by_ID($editID);
                    if ($getOriginName) {
                        while ($result = $getOriginName->fetch_assoc()) {
                ?>
                <form action="" method="post" class="form">
                    <div class="form-group">
                        <label for="originName" class="form-label">Name:</label>
                        <input type="text" name="originName" class="form-control" placeholder="Enter Origin Name..." value="<?php echo $result['originName']; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Update</button>
                        <a class="back" href="originlist.php#id<?php echo $editID; ?>">Back</a>
                    </div>
                </form>
                <?php } } ?>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>