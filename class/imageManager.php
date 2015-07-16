<?php


class imageManager {

    private $_savePath;
    private $_nameForm;
    private $_nameImage;
    private $_format;


    public function __construct($nameForm) {
        $this->_nameForm = $nameForm;
        return $this;
    }

    public function setSavePath($savePath) {
        $this->_savePath = $savePath;
        return $this;
    }

    public function setNameImage($nameImage) {
        $this->_nameImage = $nameImage;
        return $this;
    }

    public function setFormat($format) {
        $this->_format = $format;
        return $this;
    }

    public function save() {
        move_uploaded_file($_FILES[$this->_nameForm]["tmp_name"], $this->_savePath ."/" . $this->_nameImage . "." . $this->_format);
    }



}