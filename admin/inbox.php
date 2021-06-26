<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include_once './../classes/cart.php'; ?>
<?php include_once './../helpers/format.php'; ?>
<?php
    $cart = new Cart();
    $fm = new Format();
    if (isset($_GET['shiftID'])) {
        $id = $_GET['shiftID'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$shifted = $cart->shifted($id, $time, $price);
    } elseif (isset($_GET['deleteID'])) {
        $id = $_GET['deleteID'];
		$time = $_GET['time'];
		$price = $_GET['price'];
		$deleteShifted = $cart->delete_shifted($id, $time, $price);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Inbox</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Inbox List
            </div>
            <div class="card-body">
                <?php
                    if (isset($shifted)) {
                        echo $shifted;
                    } elseif (isset($deleteShifted)) {
                        echo $deleteShifted;
                    }
                ?>
                <div class="card-body__table">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Order Time</th>
                                <th class="w-20 sort">Product Name</th>
                                <th class="w-20">Product Image</th>
                                <th class="w-5 sort">Quantity</th>
                                <th class="w-10 sort">Price</th>
                                <th class="w-5 sort">Customer ID</th>
                                <th class="w-10">Address</th>
                                <th class="w-10 action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $getOrder = $cart->get_order();
                                if ($getOrder) {
                                    $id = 1;
                                    while ($result = $getOrder->fetch_assoc()) {
                            ?>
                            <tr id="id<?php echo $result['orderID']; ?>">
                                <td class="w-5"><?php echo $id++; ?></td>
                                <td class="w-15"><?php echo $fm->formatDate($result['dateOrder']); ?></td>
                                <td class="w-20"><?php echo $fm->textShorten($result['productName'], 70); ?></td>
                                <td class="w-20 image">
                                    <img src="./uploads/product/<?php echo $result['productImage']; ?>" alt="image" />
                                </td>
                                <td class="w-5"><?php echo number_format($result['quantity']); ?></td>
                                <td class="w-10"><?php echo number_format($result['price']); ?></td>
                                <td class="w-5"><?php echo $result['customerID']; ?></td>
                                <td class="w-10 control"><a href="customer.php?customerID=<?php echo $result['customerID']; ?>">View Customer</a></td>
                                <td class="w-10 control">
                                    <?php 
                                        if ($result['status'] == 0) {
                                    ?>
                                    <a href="?shiftID=<?php echo $result['orderID']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['dateOrder']; ?>">Pending</a>
                                    <?php
                                        } elseif ($result['status'] == 1) {
                                    ?>
                                    <a style="pointer-events: none;">Shifting</a>
                                    <?php
                                        } elseif ($result['status'] == 2) {
                                    ?>
                                    <a href="?deleteID=<?php echo $result['orderID']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo urlencode($result['dateOrder']); ?>">Remove</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="w-5">ID</th>
                                <th class="w-20">Order Time</th>
                                <th class="w-20">Product Name</th>
                                <th class="w-15">Product Image</th>
                                <th class="w-5">Quantity</th>
                                <th class="w-10">Price</th>
                                <th class="w-5">Customer ID</th>
                                <th class="w-10">Address</th>
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