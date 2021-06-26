<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Category {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_category($data, $uploadedFiles) {
            // Check
            $categoryName = $this->fm->validation($data['categoryName']);

            // Connect Database
            $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);

            $file = array();
            foreach ($uploadedFiles as $key => $value) {
                $file[$key] = $value;
            }
            $uploadPath = "uploads/category/";

            if (empty($categoryName) || empty($file['name'])) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $query = "SELECT * FROM tbl_category WHERE categoryName = '$categoryName'";
                $result = $this->db->select($query);
                if (!$result) {
                    $file = $this->fm->uploadFile($file, $uploadPath);
                    if (!$file) {
                        $alert = '<span class="form-notice error">Your image was not uploads</span>';
                        return $alert;
                    } else {
                        if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                        $query = "INSERT INTO tbl_category(categoryName, categoryImage) VALUES('$categoryName', '$file[name]')";
                        $result = $this->db->insert($query);
                        if ($result) {
                            $alert = '<span class="form-notice success">Insert Category Successfully</span>';
                            return $alert;
                        } else {
                            $alert = '<span class="form-notice error">Insert Category Failed</span>';
                            return $alert;
                        }
                    }
                } else {
                    $alert = '<span class="form-notice error">Category Already Exists</span>';
                    return $alert;
                }
            }
        }

        public function show_category($quantity = '') {
            if (empty($quantity)) {
                $query = "SELECT * FROM tbl_category ORDER BY categoryID ASC";
            } else {
                $quantity = (int)$quantity;
                $query = "SELECT * FROM tbl_category ORDER BY RAND() LIMIT $quantity";
            }
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_category($categoryID, $url) {
            $baseURL = 'uploads/category/'.$url;
            unlink($baseURL);
            $query = "DELETE FROM tbl_category WHERE categoryID = '$categoryID'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = '<span class="form-notice success">Delete Category Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Delete Category Failed</span>';
                return $alert;
            }
        }

        public function get_category_by_ID($categoryID) {
            $query = "SELECT * FROM tbl_category WHERE categoryID = '$categoryID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($data, $uploadedFiles, $categoryID) {
            // Check
            $categoryName = $this->fm->validation($data['categoryName']);
        
            // Connect Database
            $categoryName = mysqli_real_escape_string($this->db->link, $categoryName);
            $categoryID = mysqli_real_escape_string($this->db->link, $categoryID);
        
            $file = array();
            foreach ($uploadedFiles as $key => $value) {
                $file[$key] = $value;
            }
            $uploadPath = "uploads/category/";
        
            if (empty($categoryName)) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                if (empty($file['name'])) {
                    $query = "UPDATE tbl_category SET categoryName = '$categoryName' WHERE categoryID = '$categoryID'";
                    $result = $this->db->update($query);
                    if ($result) {
                        $alert = '<span class="form-notice success">Update Category Successfully</span>';
                        return $alert;
                    } else {
                        $alert = '<span class="form-notice error">Update Category Failed</span>';
                        return $alert;
                    }
                } else {
                    $file = $this->fm->uploadFile($file, $uploadPath);
                    if (!$file) {
                        $alert = '<span class="form-notice error">Your image was not uploads</span>';
                        return $alert;
                    } else {
                        if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        $baseURL = 'uploads/category/'.$data['oldImage'];
                        unlink($baseURL);
                        move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                        $query = "UPDATE tbl_category SET categoryName = '$categoryName', categoryImage = '$file[name]' WHERE categoryID = '$categoryID'";
                        $result = $this->db->update($query);
                        if ($result) {
                            $alert = '<span class="form-notice success">Upload Category Successfully</span>';
                            return $alert;
                        } else {
                            $alert = '<span class="form-notice error">Upload Category Failed</span>';
                            return $alert;
                        }
                    }
                }  
            }
        }
    }
?>