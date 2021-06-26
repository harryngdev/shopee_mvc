<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    include_once 'productimage.php';
?>
<?php
    function delete_product_image($productID) {
        $pdImg = new productImage();
        $showImage = $pdImg->get_image_by_ID($productID);
        if ($showImage) {
            while ($result = $showImage->fetch_assoc()) {
                $baseURL = 'uploads/product/'.$result['productImage'];
                unlink($baseURL);
            }
        }
    }
?>
<?php
    class Product {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_product($data) {
            // Connect Database
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $origin = mysqli_real_escape_string($this->db->link, $data['origin']);
            $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
            $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
            $productQuantity = (int)mysqli_real_escape_string($this->db->link, $data['productQuantity']);
            $productType = mysqli_real_escape_string($this->db->link, $data['productType']);
            
            if (empty($productName) || empty($category) || empty($origin) || empty($productDesc) || empty($productPrice) || empty($productQuantity) || $productType === '') {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $query = "INSERT INTO tbl_product(productName, categoryID, originID, productDesc, productType, productPrice, productQuantity, productSold) VALUES('$productName', '$category', '$origin', '$productDesc', '$productType', '$productPrice', $productQuantity, 0)";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = '<span class="form-notice success">Insert Product Successfully</span>';
                    return $alert;
                } else {
                    $alert = '<span class="form-notice error">Insert Product Failed</span>';
                    return $alert;
                }
            }
        }

        public function show_product() {
            $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID ORDER BY tbl_product.productID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_product_random($quantity = '') {
            if (empty($quantity)) {
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID ORDER BY RAND()";
            } else {
                $quantity = (int)$quantity;
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID ORDER BY RAND() LIMIT $quantity";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_product($productID) {
            delete_product_image($productID);
            $pdImg = new productImage();
            $delete_product_image_by_productID = $pdImg->delete_product_image_by_productID($productID);
            $query = "DELETE FROM tbl_product WHERE productID = '$productID'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = '<span class="form-notice success">Delete Product Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Delete Product Failed</span>';
                return $alert;
            }
        }

        public function get_product_by_ID($productID) {
            $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID AND tbl_product.productID = '$productID' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data, $productID) {
            // Check
            $productName = $this->fm->validation($data['productName']);
            $category = $this->fm->validation($data['category']);
            $origin = $this->fm->validation($data['origin']);
            $productDesc = $this->fm->validation($data['productDesc']);
            $productPrice = $this->fm->validation($data['productPrice']);
            $productQuantity = $this->fm->validation($data['productQuantity']);
            $productType = $this->fm->validation($data['productType']);
            
            // Connect Database
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $origin = mysqli_real_escape_string($this->db->link, $data['origin']);
            $productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
            $productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
            $productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
            $productType = mysqli_real_escape_string($this->db->link, $data['productType']);

            if (empty($productName) || empty($category) || empty($origin) || empty($productDesc) || empty($productPrice) || empty($productQuantity) || $productType === '') {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $query = "UPDATE tbl_product SET productName = '$productName', categoryID = '$category', originID = '$origin', productDesc = '$productDesc', productType = '$productType', productPrice = '$productPrice', productQuantity = '$productQuantity' WHERE productID = '$productID'";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = '<span class="form-notice success">Update Product Successfully</span>';
                    return $alert;
                } else {
                    $alert = '<span class="form-notice error">Update Product Failed</span>';
                    return $alert;
                }
            }
        }

        public function similar_product($categoryID, $productID) {
            $query = "SELECT * FROM tbl_product WHERE categoryID = '$categoryID' AND productID <> '$productID' ORDER BY RAND() LIMIT 6";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_feathered_product($quantity = '') {
            if (empty($quantity)) {
                $query = "SELECT * FROM tbl_product WHERE productType = 0 ORDER BY RAND()";
            } else {
                $quantity = (int)$quantity;
                $query = "SELECT * FROM tbl_product WHERE productType = 0 ORDER BY RAND() LIMIT $quantity";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function pagination_feathered_product($quantity = '', $location = '') {
            $quantity = (int)$quantity;
            $location = (int)$location;
            $query = "SELECT * FROM tbl_product WHERE productType = 0 ORDER BY productID DESC LIMIT $quantity OFFSET $location";
            $result = $this->db->select($query);
            return $result;
        }

        public function best_seller_product($quantity = '') {
            if (empty($quantity)) {
                $query = "SELECT * FROM tbl_product ORDER BY productSold DESC";
            } else {
                $quantity = (int)$quantity;
                $query = "SELECT * FROM tbl_product ORDER BY productSold DESC LIMIT $quantity";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function pagination_best_seller_product($quantity = '', $location = '') {
            $quantity = (int)$quantity;
            $location = (int)$location;
            $query = "SELECT * FROM tbl_product ORDER BY productSold DESC LIMIT $quantity OFFSET $location";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_category($categoryID, $quantity = '', $location = '') {
            if (empty($quantity) && empty($location)) {
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID AND tbl_product.categoryID = '$categoryID' ORDER BY tbl_product.productID DESC";
            } else {
                $quantity = (int)$quantity;
                $location = (int)$location;
                $query = "SELECT * FROM tbl_product WHERE categoryID = '$categoryID' ORDER BY productID DESC LIMIT $quantity OFFSET $location";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_by_origin($originID, $quantity = '', $location = '') {
            if (empty($quantity) && empty($location)) {
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID AND tbl_product.originID = '$originID' ORDER BY tbl_product.productID DESC";
            } else {
                $quantity = (int)$quantity;
                $location = (int)$location;
                $query = "SELECT * FROM tbl_product WHERE originID = '$originID' ORDER BY productID DESC LIMIT $quantity OFFSET $location";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function search_product($keyword, $quantity = '') {
            $keyword = $this->fm->validation($keyword);
            
            if (empty($quantity)) {
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID AND (tbl_product.productName LIKE '%$keyword%' OR tbl_category.categoryName LIKE '%$keyword%' OR tbl_origin.originName LIKE '%$keyword%') ORDER BY RAND()";
            } else {
                $quantity = (int)$quantity;
                $query = "SELECT tbl_product.*, tbl_category.categoryName, tbl_origin.originName FROM tbl_product, tbl_category, tbl_origin WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.originID = tbl_origin.originID AND (tbl_product.productName LIKE '%$keyword%' OR tbl_category.categoryName LIKE '%$keyword%' OR tbl_origin.originName LIKE '%$keyword%') ORDER BY RAND() LIMIT $quantity";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_price($productID) {
            $query = "SELECT productPrice from tbl_product WHERE productID = '$productID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_product_category($productID) {
            $query = "SELECT tbl_category.categoryName FROM tbl_product, tbl_category WHERE tbl_product.categoryID = tbl_category.categoryID AND tbl_product.productID = '$productID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_wishlist($productID, $customerID) {
            $query = "INSERT INTO tbl_wishlist(customerID, productID) VALUES('$customerID', '$productID')";
            $result = $this->db->insert($query);
            echo "<script>window.location = 'pageproduct.php?productID=".$productID."'</script>";
            // header("location: pageproduct.php?productID=".$productID);
        }

        public function get_product_like($productID) {
            $query = "SELECT COUNT(*) getLike FROM tbl_wishlist WHERE productID = '$productID' GROUP BY productID";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_like($productID, $customerID) {
            $query = "SELECT * FROM tbl_wishlist WHERE productID = '$productID' AND customerID = '$customerID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_wishlist($productID, $customerID) {
            $query = "DELETE FROM tbl_wishlist WHERE productID = '$productID' AND customerID = '$customerID'";
            $result = $this->db->delete($query);
            echo "<script>window.location = 'pageproduct.php?productID=".$productID."'</script>";
            // header("location: pageproduct.php?productID=".$productID);
        }
    }
?>