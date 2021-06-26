<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/slider.php'; ?>
<?php
    $slider = new Slider();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $insertSlider = $slider->insert_slider($_POST, $_FILES['sliderImage']);
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
                <i class="fas fa-folder-plus"></i>
                Add Slider
            </div>
            <div class="card-form">
                <?php
                    if (isset($insertSlider)) {
                        echo $insertSlider;
                    }
                ?>
                <form action="slideradd.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sliderTitle" class="form-label">Slider Title:</label>
                        <input type="text" name="sliderTitle" class="form-control" placeholder="Enter Slider Title..." />
                    </div>
                    <div class="form-group">
                        <label for="sliderImage" class="form-label">Upload Image: </label>
                        <input type="file" name="sliderImage" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="sliderType" class="form-label">Slider Type:</label>
                        <select name="sliderType" class="form-control">
                            <option value="">-------- Select Type --------</option>
                            <option value="on">On</option>
                            <option value="off">Off</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="submit" class="form-label"></label>
                        <button type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include './inc/footer.php'; ?>