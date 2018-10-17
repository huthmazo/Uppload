<?php

class upload{

    private $error = 0,
            $file,
            $input,
            $maxSize = 0,
            $name,
            $savedName = '',
            $target = './',
            $type = '';

    function __construct($input) {
        
        $this->input = $input;
        
        if(isset($input) && $input['error'] === 0 && $input['name'] != '') {
            $this->file = $input;
            $this->name = $this->file['name'];
        } else {
            $this->error = 1;
        }
               
    }
    

    function getError() {
        
        return $this->error;
    }

    function getMaxSize() {
        return $this->maxSize;
    }
    
    function getName() {
       
        return $this->name;
    }


    function setMaxSize($size) {
        if(is_int($size) && $size > 0) {
            $this->maxSize = $size;
        }
        return $this;
    }

    function setName($name) {
        if(is_string($name) && trim($name) !== '') {
            $this->name = trim($name);
        }
        return $this;
    }

    function setTarget($target) {
        if(is_string($target) && trim($target) !== '') {
            $this->target = trim($target);
        }
        return $this;
    }

    function setType($type) {
        if(is_string($type) && trim($type) !== '') {
            $this->type = trim($type);
        }
        return $this;
    }

    function upload() {
        if ($this->file['size'] >0) {
            move_uploaded_file($this->file['tmp_name'], $this->target . $this->name);
        }
        else{
            echo 'El fichero no existe o está vacio';
        }
       
    }
}
