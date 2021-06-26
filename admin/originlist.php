<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/origin.php'; ?>
<?php
    $origin = new Origin();
    if (isset($_GET['deleteID']) && !empty($_GET['deleteID'])) {
        $deleteID = $_GET['deleteID'];
        $deleteOrigin = $origin->delete_origin($deleteID);
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
                <i class="fas fa-table"></i>
                Origin List
            </div>
            <div class="card-body">
                <?php
                    if (isset($deleteOrigin)) {
                        echo $deleteOrigin;
                    }
                ?>
                <div class="card-body__table">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Origin Name</th>
                                <th class="w-10 action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $showOrigin = $origin->show_origin();
                                if ($showOrigin) {
                                    $id = 1;
                                    while ($result = $showOrigin->fetch_assoc()) {
                            ?>
                            <tr id="id<?php echo $result['originID']; ?>">
                                <td class="w-5"><?php echo $id++; ?></td>
                                <td class="w-15"><?php echo $result['originName']; ?></td>
                                <td class="w-10 control">
                                    <a class="b-r" href="originedit.php?editID=<?php echo $result['originID']; ?>">Edit</a>
                                    <a class="b-l" onclick="return confirm('Are you want to delete?')" href="?deleteID=<?php echo $result['originID']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Origin Name</th>
                                <th class="w-10">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="card-footer">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>