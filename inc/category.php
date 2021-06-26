<section id="category">
    <div class="container">
        <div class="category-inner">
            <div class="category-title">
                <h3>Danh mục</h3>
            </div>
            <div class="category-list">
                <div class="category-list-wrapper">
                    <ul>
                        <?php
                            $getCategory = $category->show_category();
                            if ($getCategory) {
                                while ($result = $getCategory->fetch_assoc()) {
                        ?>
                        <li class="category-item">
                            <a href="pageproductbycat.php?categoryID=<?php echo $result['categoryID']; ?>">
                                <img src="admin/uploads/category/<?php echo $result['categoryImage']; ?>" alt="category" />
                                <p><?php echo $result['categoryName']; ?></p>
                            </a>
                        </li>
                        <?php } } ?>
                    </ul>
                </div>
                <div class="carousel-arrow--prev">
                    <i class="fas fa-chevron-left"></i>
                </div>
                <div class="carousel-arrow--next">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>