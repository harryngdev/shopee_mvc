<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath . '/../lib/database.php');
    include_once ($filepath . '/../helpers/format.php');
?>
<?php
    class Cart {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_to_cart($productID, $quantity) {
            $quantity = $this->fm->validation($quantity);
            
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            
            $sessionID = session_id();
            
            $queryProduct = "SELECT tbl_product.*, tbl_category.categoryName FROM tbl_product, tbl_category WHERE tbl_product.categoryID = tbl_category.categoryID AND productID = '$productID'";
            $resultProduct = $this->db->select($queryProduct)->fetch_assoc();
            $queryImage = "SELECT * FROM tbl_product_image WHERE productID = '$productID' LIMIT 1";
            $resultProduct = $this->db->select($queryProduct)->fetch_assoc();
            $resultImage = $this->db->select($queryImage)->fetch_assoc();

            $queryCart = "INSERT INTO tbl_cart(productID, sessionID, productName, categoryName, productPrice, quantity, productImage) VALUES('$productID', '$sessionID', '$resultProduct[productName]', '$resultProduct[categoryName]', '$resultProduct[productPrice]', '$quantity', '$resultImage[productImage]')";
            $resultCart = $this->db->insert($queryCart);
            if ($resultCart) {
                echo "<script>window.location = 'cart.php'</script>";
                // header('location: cart.php');
            } else {
                header('location: 404.php');
            }
        }        

        public function get_product_cart() {
            $sessionID = session_id();

            $query = "SELECT * FROM tbl_cart WHERE sessionID = '$sessionID'";
            $result = $this->db->select($query);

            return $result;
        }

        public function delete_cart($cartID) {
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $query = "DELETE FROM tbl_cart WHERE cartID = '$cartID'";
            $result = $this->db->delete($query);
            if ($result) {
                header('location: cart.php');
            } else {
                header('location: index.php');
            }
        }

        public function update_quantity_cart($cartID, $quantity) {
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartID = '$cartID'";
            $result = $this->db->update($query);
            if ($result) {
                header('location: cart.php?id=live#'.$cartID);
            } else {
                header('index.php');
            }
        }

        public function delete_all_data_cart() {
            $sessionID = session_id();

            $query = "DELETE FROM tbl_cart WHERE sessionID = '$sessionID'";
            $result = $this->db->delete($query);

            return $result;
        }

        public function insert_order($customerID) {
            $sessionID = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sessionID = '$sessionID'";
            $get_product = $this->db->select($query);
            if ($get_product) {
                while ($result = $get_product->fetch_assoc()) {
                    $productID = $result['productID'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['productPrice'] * $quantity;
                    $productImage = $result['productImage'];
                    $customerID = $customerID;

                    $query_order = "INSERT INTO tbl_order(productID, productName, customerID, quantity, price, productImage) VALUES('$productID', '$productName', '$customerID', '$quantity', '$price', '$productImage')";
                    $result_order = $this->db->insert($query_order);
                }
            }
        }

        public function get_notice_order() {
            $query = "SELECT COUNT(*) orderNotice FROM tbl_order WHERE status = 0";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_order() {
            $query = "SELECT * FROM tbl_order ORDER BY dateOrder DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_purchase_order($customerID, $status) {
            $status = (int)$status;
            $query = "SELECT * FROM tbl_order WHERE customerID = '$customerID' AND status = '$status' ORDER BY dateOrder DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function shifted($id, $time, $price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = 1 WHERE orderID = '$id' AND dateOrder = '$time' AND price = '$price'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<span class="form-notice success">Update Order Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Update Order Failed</span>';
                return $alert;
            }
        }

        public function delete_shifted($id, $time, $price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order WHERE orderID = '$id' AND dateOrder = '$time' AND price = '$price'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = '<span class="form-notice success">Delete Order Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Delete Order Successfully</span>';
                return $alert;
            }
        }

        public function shifted_confirm($id, $time, $price) {
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET status = 2 WHERE customerID = '$id' AND dateOrder = '$time' AND price = '$price'";
            $result = $this->db->update($query);
            if ($result) {
                echo "<script>window.location = 'purchase.php?type=1&notice=true'</script>";
                // header('location: purchase.php?type=1&notice=true');
            } else {
                echo "<script>window.location = 'purchase.php?type=1&notice=false'</script>";
                // header('location: purchase.php?type=1&notice=false');
            }
        }
    }
?>