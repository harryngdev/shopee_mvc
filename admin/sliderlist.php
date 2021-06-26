<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/slider.php'; ?>
<?php
    $slider = new Slider();
    if (isset($_GET['deleteID']) && !empty($_GET['deleteID'] && isset($_GET['url']) && !empty($_GET['url']))) {
        $deleteID = $_GET['deleteID'];
        $url = $_GET['url'];
        $deleteslider = $slider->delete_slider($deleteID, $url);
    } elseif (isset($_GET['update_type_slider']) && !empty($_GET['update_type_slider']) && isset($_GET['type']) && !empty($_GET['type'])) {
        $sliderID = $_GET['update_type_slider'];
        $sliderType = $_GET['type'];
        $uploadTypeSlider = $slider->update_type_slider($sliderID, $sliderType);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Slider</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Slider List
            </div>
            <div class="card-body">
                <?php
                    if (isset($deleteSlider)) {
                        echo $deleteSlider;
                    } elseif (isset($uploadTypeSlider)) {
                        echo $uploadTypeSlider;
                    }
                ?>
                <div class="card-body__table">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Slider Title</th>
                                <th class="w-10">Slider Image</th>
                                <th class="w-10 action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $showSlider = $slider->show_slider();
                                if ($showSlider) {
                                    $id = 1;
                                    while ($result = $showSlider->fetch_assoc()) {
                            ?>
                            <tr id="id<?php echo $result['sliderID']; ?>">
                                <td class="w-5"><?php echo $id++; ?></td>
                                <td class="w-15"><?php echo $result['sliderTitle']; ?></td>
                                <td class="w-10 image"><img src="./uploads/slider/<?php echo $result['sliderImage']; ?>" alt="image"></td>
                                <td class="w-10 control">
                                    <?php if ($result['sliderType'] == "on") { ?>
                                    <a class="b-r" href="?update_type_slider=<?php echo $result['sliderID']; ?>&type=<?php echo $result['sliderType']; ?>#id<?php echo $result['sliderID']; ?>">On</a>
                                    <?php } elseif ($result['sliderType'] == "off") { ?>
                                    <a class="b-r" href="?update_type_slider=<?php echo $result['sliderID']; ?>&type=<?php echo $result['sliderType']; ?>#id<?php echo $result['sliderID']; ?>">Off</a>
                                    <?php } ?>
                                    <a class="b-l" onclick="return confirm('Are you want to delete?')" href="?deleteID=<?php echo $result['sliderID']; ?>&url=<?php echo urlencode($result['sliderImage']); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Slider Title</th>
                                <th class="w-10">Slider Image</th>
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