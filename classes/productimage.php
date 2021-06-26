<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class productImage {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_image_by_ID($productID) {
            $query = "SELECT * FROM tbl_product_image WHERE productID = '$productID' LIMIT 5";
            $result = $this->db->select($query);
            return $result;
        }

        public function upload_product_image($uploadedFiles, $productID) {
            if (empty($uploadedFiles["name"])) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $files = array();
                $alert = "";
                foreach ($uploadedFiles as $key => $values) {
                    foreach ($values as $index => $value) {
                        $files[$index][$key] = $value;
                    }
                }
                $uploadPath = "uploads/product/";
            
                $index = 0;
                foreach ($files as $file) {
                    $file = $this->fm->uploadFile($file, $uploadPath);
                    if (!$file) {
                        $alert .= '<span class="form-notice error">The file '.htmlspecialchars(basename($files[$index]["name"])).' not uploads</span>';
                    } else {
                        if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                        $query = "INSERT INTO tbl_product_image(productID, productImage) VALUES ('$productID', '$file[name]')";
                        $result = $this->db->insert($query);
                        if ($result) {
                            $alert .= '<span class="form-notice success">The file '.htmlspecialchars(basename($file['name'])).' has been uploaded'.'</span>';
                        } else {
                            $alert .= '<span class="form-notice error">There was an error uploading your file '.htmlspecialchars(basename($file['name'])).'</span>';
                        }
                    }
                    $index++;
                }
                return $alert;
            }
        }

        public function delete_product_image($imageID, $url) {
            $baseURL = 'uploads/product/'.$url;
            unlink($baseURL);
            $query = "DELETE FROM tbl_product_image WHERE imageID = '$imageID'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function delete_product_image_by_productID($productID) {
            $query = "DELETE FROM tbl_product_image WHERE productID = '$productID'";
            $result = $this->db->delete($query);
            return $result;
        }
    }
?>