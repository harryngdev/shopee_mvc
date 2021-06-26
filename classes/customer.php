<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath . '/../lib/database.php');
    include_once ($filepath . '/../helpers/format.php');
?>
<?php
    class Customer {
        private $db; // database
        private $fm; // format

        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_customer($data) {
            $name = $this->fm->validation($data['name']);
            $account = $this->fm->validation($data['account']);
            $email = $this->fm->validation($data['email']);
            $phone = $this->fm->validation($data['phone']);
            $password = $this->fm->validation($data['password']);

            $name = mysqli_real_escape_string($this->db->link, $name);
            $account = mysqli_real_escape_string($this->db->link, $account);
            $email = mysqli_real_escape_string($this->db->link, $email);
            $phone = mysqli_real_escape_string($this->db->link, $phone);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if (empty($name) || empty($account) || empty($email) || empty($phone) || empty($password)) {
                header('location: login.php?action=empty');
            } else {
                $password = md5($password);
                $check = "SELECT * FROM tbl_customer WHERE (customerEmail = '$email' OR customerAccount = '$account' OR customerPhone = '$phone') LIMIT 1";
                $result_check = $this->db->select($check);
                if ($result_check) {
                    header('location: login.php?action=existed');
                } else {
                    $query = "INSERT INTO tbl_customer(customerName, customerAccount, customerEmail, customerPhone, customerPassword) VALUES('$name', '$account', '$email', '$phone', '$password')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        header('location: login.php?action=true');
                    } else {
                        header('location: login.php?action=false');
                    }
                }
            }
        }

        public function login_customer($data) {
            $account = $this->fm->validation($data['account']);
            $password = $this->fm->validation($data['password']);
            
            $account = mysqli_real_escape_string($this->db->link, $account);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if (empty($account) || empty($password)) {
                header('location: login.php?action=empty');
            } else {
                $password = md5($password);
                $check = "SELECT * FROM tbl_customer WHERE (customerEmail = '$account' OR customerAccount = '$account' OR customerPhone = '$account') AND customerPassword = '$password' LIMIT 1";
                $result = $this->db->select($check);
                if ($result) {
                    $value = $result->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id', $value['customerID']);
                    Session::set('customer_name', $value['customerName']);
                    Session::set('customer_account', $value['customerAccount']);
                    Session::set('customer_image', $value['customerImage']);
                    header('location: cart.php');
                } else {
                    header('location: login.php?action=failed');
                }
            }
        }

        public function show_details_customer($customerID) {
            $query = "SELECT * FROM tbl_customer WHERE customerID = '$customerID' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_customer($data, $uploadedFiles, $customerID) {
            // Check
            $customerName = $this->fm->validation($data['customerName']);
            $customerEmail = $this->fm->validation($data['customerEmail']);
            $customerPhone = $this->fm->validation($data['customerPhone']);
            $customerAddress = $this->fm->validation($data['customerAddress']);
        
            // Connect Database
            $customerName = mysqli_real_escape_string($this->db->link, $customerName);
            $customerEmail = mysqli_real_escape_string($this->db->link, $customerEmail);
            $customerPhone = mysqli_real_escape_string($this->db->link, $customerPhone);
            $customerAddress = mysqli_real_escape_string($this->db->link, $customerAddress);
            $customerID = mysqli_real_escape_string($this->db->link, $customerID);
        
            $file = array();
            foreach ($uploadedFiles as $key => $value) {
                $file[$key] = $value;
            }
            $uploadPath = "admin/uploads/customer/";
        
            if (empty($customerName) || empty($customerEmail) || empty($customerPhone) || empty($customerAddress)) {
                header('location: user.php?action=empty');
            } else {
                if (empty($file['name'])) {
                    Session::set('customer_name', $customerName);
                    $query = "UPDATE tbl_customer SET customerName = '$customerName', customerEmail = '$customerEmail', customerPhone = '$customerPhone', customerAddress = '$customerAddress' WHERE customerID = '$customerID'";
                    $result = $this->db->update($query);
                    if ($result) {
                        header('location: user.php?action=true');
                    } else {
                        header('location: user.php?action=false');
                    }
                } else {
                    $file = $this->fm->uploadFile($file, $uploadPath);
                    if (!$file) {
                        header('location: user.php?action=failed');
                    } else {
                        if (!is_dir($uploadPath)) {
                            mkdir($uploadPath, 0777, true);
                        }
                        $baseURL = 'admin/uploads/customer/'.Session::get('customer_image');
                        unlink($baseURL);
                        move_uploaded_file($file["tmp_name"], $uploadPath . '/' . $file["name"]);
                        Session::set('customer_name', $customerName);
                        Session::set('customer_image', $file['name']);
                        $query = "UPDATE tbl_customer SET customerName = '$customerName', customerEmail = '$customerEmail', customerPhone = '$customerPhone', customerAddress = '$customerAddress', customerImage = '$file[name]' WHERE customerID = '$customerID'";
                        $result = $this->db->update($query);
                        if ($result) {
                            header('location: user.php?action=true');
                        } else {
                            header('location: user.php?action=false');
                        }
                    }
                }  
            }
        }

        public function change_password($data, $customerID) {
            $oldPass = $data['oldPass'];
            $newPass = $data['newPass'];
            $confirmPass = $data['confirmPass'];
            if (empty($oldPass) || empty($newPass) || empty($confirmPass)) {
                header('location: user.php?action=empty');
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

                $query = "SELECT tbl_customer.customerPassword FROM tbl_customer WHERE customerID = '$customerID'";
                $result = $this->db->select($query);
                if ($oldPass != $result->fetch_assoc()['customerPassword']) {
                    header('location: user.php?action=oldpwfailed');
                } else {
                    if ($newPass != $confirmPass) {
                        header('location: user.php?action=cfpwfailed');
                    } else {
                        $query = "UPDATE tbl_customer SET customerPassword = '$confirmPass' WHERE customerID = '$customerID'";
                        $result = $this->db->update($query);
                        if ($result) {
                            header('location: user.php?action=pwtrue');
                        } else {
                            header('location: user.php?action=pwfailed');
                        }
                    }
                }
            }
        }
    }
?>