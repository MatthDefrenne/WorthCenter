<?php

class flash {

    public static function setFlash($name, $value) {
        $_SESSION[$name] = $value;
    }

}