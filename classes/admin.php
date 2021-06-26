<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath . '/../lib/session.php');
    Session::checkLogin();
    include_once ($filepath . '/../lib/database.php');
    include_once ($filepath . '/../helpers/format.php');
?>
<?php
    class Admin {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($adminAccount, $adminPass) {
            $adminAccount = $this->fm->validation($adminAccount);
            $adminPass = $this->fm->validation($adminPass);
            
            $adminAccount = mysqli_real_escape_string($this->db->link, $adminAccount);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if (empty($adminAccount) || empty($adminPass)) {
                $alert = "<span>Account and Password must be not empty</span>";
                return $alert;
            } else {
                $query = "SELECT * FROM admin WHERE adminAccount = '$adminAccount' AND adminPass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);

                if ($result !== false) {
                    $value = $result->fetch_assoc();
                    Session::set('adminLogin', true);
                    Session::set('adminID', $value['adminID']);
                    Session::set('adminAccount', $value['adminAccount']);
                    Session::set('adminName', $value['adminName']);
                    if (empty($value['adminImage'])) {
                        Session::set('adminImage', 'admin_avt.jpg');
                    } else {
                        Session::set('adminImage', $value['adminImage']);
                    }
                    header('location: index.php');
                } else {
                    $alert = "<span>Account and Password not match</span>";
                    return $alert;
                }
            }
        }

        public function get_admin_by_ID($adminID) {
            $query = "SELECT * FROM admin WHERE adminID = '$adminID'";
            $result = $this->db->select($query);
            return $result;
        }
     
        public function update_admin($data, $uploadedFiles, $adminID) {
            // Check
            $adminName = $this->fm->validation($data['adminName']);
            $adminEmail = $this->fm->validation($data['adminEmail']);
            $adminAccount = $this->fm->validation($data['adminAccount']);
        
            // Connect Database
            $adminName = mysqli_real_escape_string($this->db->link, $adminName);
            $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);
            $adminAccount = mysqli_real_escape_string($this->db->link, $adminAccount);
            $adminID = mysqli_real_escape_string($this->db->link, $adminID);
        
            $file = array();
            foreach ($uploadedFiles as $key => $value) {
                $file[$key] = $value;
            }
            $uploadPath = "uploads/admin/";
        
            if (empty($adminName) || empty($adminEmail) || empty($adminAccount)) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                if (empty($file['name'])) {
                    Session::set('adminAccount', $adminAccount);
                    Session::set('adminName', $adminName);
                    $query = "UPDATE admin SET adminName = '$adminName', adminEmail = '$adminEmail', adminAccount = '$adminAccount' WHERE adminID = '$adminID'";
                    $result = $this->db->update($query);
                    if ($result) {
                        $alert = '<span class="form-notice success">Update Admin Successfully</span>';
                        return $alert;
                    } else {
                        $alert = '<span class="form-notice error">Update Admin Failed</span>';
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
                        $baseURL = 'uploads/admin/'.$data['oldImage'];
                        unlink($baseURL);
                        move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                        Session::set('adminAccount', $adminAccount);
                        Session::set('adminName', $adminName);
                        Session::set('adminImage', $file['name']);
                        $query = "UPDATE admin SET adminName = '$adminName', adminEmail = '$adminEmail', adminAccount = '$adminAccount', adminImage = '$file[name]' WHERE adminID = '$adminID'";
                        $result = $this->db->update($query);
                        if ($result) {
                            $alert = '<span class="form-notice success">Upload Admin Successfully</span>';
                            return $alert;
                        } else {
                            $alert = '<span class="form-notice error">Upload Admin Failed</span>';
                            return $alert;
                        }
                    }
                }  
            }
        }

        public function change_password($data, $adminID) {
            $oldPass = $data['oldPass'];
            $newPass = $data['newPass'];
            $confirmPass = $data['confirmPass'];
            if (empty($oldPass) || empty($newPass) || empty($confirmPass)) {
                $alert = '<span class="form-notice error">Fields must be not empty</span>';
                return $alert;
            } else {
                $oldPass = md5($oldPass);
                $newPass = md5($newPass);
                $confirmPass = md5($confirmPass);

                $oldPass = $this->fm->validation($oldPass);
                $newPass = $this->fm->validation($newPass);
                $confirmPass = $this->fm->validation($confirmPass);
                
                $oldPass = mysqli_real_escape_string($this->db->link, $oldPass);
                $newPass = mysqli_real_escape_string($this->db->link, $newPass);
                $confirmPass = mysqli_real_escape_string($this->db->link, $confirmPass);

                $query = "SELECT admin.adminPass FROM admin WHERE adminID = '$adminID'";
                $result = $this->db->select($query);
                if ($oldPass != $result->fetch_assoc()['adminPass']) {
                    $alert = '<span class="form-notice error">Old Password not match</span>';
                    return $alert;
                } else {
                    if ($newPass != $confirmPass) {
                        $alert = '<span class="form-notice error">Confirm Password not match</span>';
                        return $alert;
                    } else {
                        $query = "UPDATE admin SET adminPass = '$confirmPass' WHERE adminID = '$adminID'";
                        $result = $this->db->update($query);
                        if ($result) {
                            $alert = '<span class="form-notice success">Change Password Successfully</span>';
                            return $alert;
                        } else {
                            $alert = '<span class="form-notice error">Change Password Failed</span>';
                            return $alert;
                        }
                    }
                }
            }
        }
    }
?>