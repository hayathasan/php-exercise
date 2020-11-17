<?php
    set_time_limit(600);

    $image_processor = new image_processor();

    class image_processor {
        public $font = "D:\\OneDrive\\htdocs\\test\\php\\segoe-ui.ttf";
        public $watermark = "D:\\GoogleDrive\\muniba & mom\\Logo & Banner\\logo_watermark.png";
        public $src_dir = "D:\\GoogleDrive\\muniba & mom\\Pin\\New Albam.15 November\\test\\";
        public $dst_dir = "D:\\GoogleDrive\\muniba & mom\\Pin\\New Albam.15 November\\test\\new\\";        
        public $src_file_exception = [".", "..","desktop.ini","image.php","new"];
        public $height = 600;
        public $width = 600;  
        public $src_files = []; 

        function __construct() {
            
            $this->src_files = array_values(array_diff(scandir($this->src_dir . "/"), $this->src_file_exception));
            
            foreach ($this->src_files as $file) {
                $this->image_blurred_bg($file);    
            }

        }
    
        function image_blurred_bg($image){
            $src_img = $this->src_dir.$image;
            try {
                $info = getimagesize($src_img);
            } catch (Exception $e){
                return false;
            }

            $mimetype = image_type_to_mime_type($info[2]);
            switch ($mimetype) {
                case 'image/jpeg': $src_img = imagecreatefromjpeg($src_img); break;
                case 'image/gif': $src_img = imagecreatefromgif($src_img); break;
                case 'image/png': $src_img = imagecreatefrompng($src_img); break;
                default: return false;
            }

            $wor = imagesx($src_img);
            $hor = imagesy($src_img);
            $back = imagecreatetruecolor($this->width, $this->height);

            $maxfact = max($this->width/$wor, $this->height/$hor);
            $new_w = $wor*$maxfact;
            $new_h = $hor*$maxfact;
            imagecopyresampled($back, $src_img, -(($new_w - $this->width)/2), -(($new_h - $this->height)/2), 0, 0, $new_w, $new_h, $wor, $hor);

            // blur back image
            for ($x=1; $x <=40; $x++){
                imagefilter($back, IMG_FILTER_GAUSSIAN_BLUR, 999);
            }
            imagefilter($back, IMG_FILTER_SMOOTH,99);
            imagefilter($back, IMG_FILTER_BRIGHTNESS, 10);

            $minfact = min($this->width/$wor, $this->height/$hor);
            $new_w = $wor*$minfact;
            $new_h = $hor*$minfact;

            $front = imagecreatetruecolor($new_w, $new_h);
            imagecopyresampled($front, $src_img, 0, 0, 0, 0, $new_w, $new_h, $wor, $hor);


            // add watermark to front image
            $watermark = imagecreatefrompng($this->watermark);
            $wtrmrk_w = imagesx($watermark);
            $wtrmrk_h = imagesy($watermark);
            $center_x = ($new_w / 2) - ($wtrmrk_w / 2); 
            $center_y = ($new_h / 2) - ($wtrmrk_h / 2); 
            imagecopy($front, $watermark, $center_x, $center_y, 0, 0, $wtrmrk_w, $wtrmrk_h);

            // merge front & back image
            imagecopymerge($back, $front,-(($new_w - $this->width)/2), -(($new_h - $this->height)/2), 0, 0, $new_w, $new_h, 100);
            
            // add text        
            $font_size = 12;
            $text = "This image is collected from internet!";
            $color = imagecolorallocate($front, 255, 255, 255);
            $bbox = imagettfbbox($font_size, 0, $this->font, $text);
            $text_pos_center = (imagesx($back) / 2) - (($bbox[2] - $bbox[0]) / 2);        
            imagettftext($back, $font_size, 0, $text_pos_center, imagesy($back) - 10, $color, $this->font, $text);

            // output new file
            imagejpeg($back, $this->dst_dir.$image, 100);
            imagedestroy($back);
            imagedestroy($front);

            return true;
        }
    }
    
    

