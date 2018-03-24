<?php
class FileUpload {
    
    protected $filename, $filetoupload;
    
    public function __construct($filetoupload) {
        //Declare the instance's "filetoupload" variable as the inputted "$filetoupload" parameter
        $this->filetoupload = $filetoupload;
    }
    
    public function upload() {
        if (is_uploaded_file($this->filetoupload['tmp_name'])); {
            if ($this->filetoupload['type'] == 'image/jpeg' || $this->filetoupload['type'] == 'image/pjpeg' || $this->filetoupload['type'] == 'image/bmp' || $this->filetoupload['type'] == 'image/JPEG' || $this->filetoupload['type'] == 'image/gif') {
//Move the file to the "Images" directory and declare the action as the $result variable
$result = move_uploaded_file($this->filetoupload['tmp_name'], getcwd() . '/images/' . $this->filetoupload['name']);
$result2 = move_uploaded_file($this->filetoupload['tmp_name'], getcwd().'/' . $this->filetoupload['name']);
            } else { 
                //Declare the result variable as false
                $result = false;
            }
        }
    }

            public function getFileName() {
                //Return the name of the file that is being uploaded
                return $this->filetoupload['name'];
            }    
}

