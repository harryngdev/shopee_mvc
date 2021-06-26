<?php include './inc/header.php'; ?>
<?php include './inc/dashboard.php'; ?>
<?php include './../classes/category.php'; ?>
<?php
    $category = new Category();
    if (isset($_GET['deleteID']) && !empty($_GET['deleteID'] && isset($_GET['url']) && !empty($_GET['url']))) {
        $deleteID = $_GET['deleteID'];
        $url = $_GET['url'];
        $deleteCategory = $category->delete_category($deleteID, $url);
    }
?>
<div class="main-content">
    <div class="container-wrapper">
        <div class="breadcrumb">
            <p>Dashboard</p>
            <p>&nbsp;/ Category</p>
        </div>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Category List
            </div>
            <div class="card-body">
                <?php
                    if (isset($deleteCategory)) {
                        echo $deleteCategory;
                    }
                ?>
                <div class="card-body__table">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Category Name</th>
                                <th class="w-10">Category Image</th>
                                <th class="w-10 action">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $showCategory = $category->show_category();
                                if ($showCategory) {
                                    $id = 1;
                                    while ($result = $showCategory->fetch_assoc()) {
                            ?>
                            <tr id="id<?php echo $result['categoryID']; ?>">
                                <td class="w-5"><?php echo $id++; ?></td>
                                <td class="w-15"><?php echo $result['categoryName']; ?></td>
                                <td class="w-10 image"><img src="./uploads/category/<?php echo $result['categoryImage']; ?>" alt=""></td>
                                <td class="w-10 control">
                                    <a class="b-r" href="categoryedit.php?editID=<?php echo $result['categoryID']; ?>">Edit</a>
                                    <a class="b-l" onclick="return confirm('Are you want to delete?')" href="?deleteID=<?php echo $result['categoryID']; ?>&url=<?php echo urlencode($result['categoryImage']); ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="w-5 sort">ID</th>
                                <th class="w-15 sort">Category Name</th>
                                <th class="w-10">Category Image</th>
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