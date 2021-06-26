<?php
    class Format {
        public function formatDate($date) {
            return date('F j, Y, g:i a', strtotime($date));
        }

        public function textShorten($text, $limit = 400) {
            if (strlen($text) > $limit) {
                $text = substr($text, 0, $limit - 3);
                $text = $text . "...";
            }
            return $text;
        }

        public function validation($data) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        public function uploadFile($file, $uploadPath) {
            // Check if image file is a actual image or fake image
            if (getimagesize($file['tmp_name']) === false) {
                return false;
            }

            // Check file size
            if ($file['size'] > 2 * 1024 * 1024) {
                return false;
            }

            // All certain file formats
            $validTypes = array('jpg', 'jpeg', 'png', 'gif', 'jfif', 'heic');

            $fileType = strtolower(pathinfo(basename($file['name']), PATHINFO_EXTENSION));
            if (!in_array($fileType, $validTypes)) {
                return false;
            }

            // Check if file already exists? And rename if file is available 
            $num = 1;
            $fileName = substr($file['name'], 0, strrpos($file['name'], "."));
            while (file_exists($uploadPath . '/' . $fileName . '.' . $fileType)) {
                $fileName = $fileName . "(" . $num . ")";
                $num++;
            }
            $file['name'] = $fileName . '.' . $fileType;
            return $file;
        }        
    }
?>