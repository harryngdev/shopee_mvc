<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Origin {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_origin($data) {
            // Check
            $originName = $this->fm->validation($data['originName']);

            // Connect Database
            $originName = mysqli_real_escape_string($this->db->link, $originName);

            if (empty($originName)) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $query = "SELECT * FROM tbl_origin WHERE originName = '$originName'";
                $result = $this->db->select($query);
                if (!$result) {
                    $query = "INSERT INTO tbl_origin(originName) VALUES('$originName')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        $alert = '<span class="form-notice success">Insert Origin Successfully</span>';
                        return $alert;
                    } else {
                        $alert = '<span class="form-notice error">Insert Origin Failed</span>';
                        return $alert;
                    }
                } else {
                    $alert = '<span class="form-notice error">Origin Already Exists</span>';
                    return $alert;
                }
            }
        }

        public function show_origin() {
            $query = "SELECT * FROM tbl_origin ORDER BY originID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_origin($originID) {
            $query = "DELETE FROM tbl_origin WHERE originID = '$originID'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = '<span class="form-notice success">Delete Origin Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Delete Origin Failed</span>';
                return $alert;
            }
        }

        public function get_origin_by_ID($originID) {
            $query = "SELECT * FROM tbl_origin WHERE originID = '$originID'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_origin($data, $originID) {
            // Check
            $originName = $this->fm->validation($data['originName']);
        
            // Connect Database
            $originName = mysqli_real_escape_string($this->db->link, $originName);
            $originID = mysqli_real_escape_string($this->db->link, $originID);
        
            if (empty($originName)) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $query = "UPDATE tbl_origin SET originName = '$originName' WHERE originID = '$originID'";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = '<span class="form-notice success">Update Origin Successfully</span>';
                    return $alert;
                } else {
                    $alert = '<span class="form-notice error">Update Origin Failed</span>';
                    return $alert;
                }
            }
        }
    }
?>