<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Slider {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_slider($data, $uploadedFiles) {
            // Check
            $sliderTitle = $this->fm->validation($data['sliderTitle']);

            // Connect Database
            $sliderTitle = mysqli_real_escape_string($this->db->link, $sliderTitle);
            $sliderType = mysqli_real_escape_string($this->db->link, $data['sliderType']);

            $file = array();
            foreach ($uploadedFiles as $key => $value) {
                $file[$key] = $value;
            }
            $uploadPath = "uploads/slider/";
            
            if (empty($sliderTitle) || $sliderType === '') {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $file = $this->fm->uploadFile($file, $uploadPath);
                if (!$file) {
                    $alert = '<span class="form-notice error">Your image was not uploads</span>';
                    return $alert;
                } else {
                    if (!is_dir($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
                    move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                    $query = "INSERT INTO tbl_slider(sliderTitle, sliderImage, sliderType) VALUES('$sliderTitle', '$file[name]', '$sliderType')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        $alert = '<span class="form-notice success">Insert Slider Successfully</span>';
                        return $alert;
                    } else {
                        $alert = '<span class="form-notice error">Insert Slider Failed</span>';
                        return $alert;
                    }
                }
            }
        }

        public function show_slider() {
            $query = "SELECT * FROM tbl_slider ORDER BY sliderID DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_slider($sliderID, $url) {
            $baseURL = 'uploads/slider/'.$url;
            unlink($baseURL);
            $query = "DELETE FROM tbl_slider WHERE sliderID = '$sliderID'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = '<span class="form-notice success">Delete Slider Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice error">Delete Slider Failed</span>';
                return $alert;
            }
        }

        public function update_type_slider($sliderID, $sliderType) {
            if ($sliderType == "off") {
                $query = "UPDATE tbl_slider SET sliderType = 'on' WHERE sliderID = '$sliderID'";
            } elseif ($sliderType == "on") {
                $query = "UPDATE tbl_slider SET sliderType = 'off' WHERE sliderID = '$sliderID'";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = '<span class="form-notice success">Update Slider Successfully</span>';
                return $alert;
            } else {
                $alert = '<span class="form-notice success">Update Slider Not Success</span>';
                return $alert;
            }
        }
    }
?>