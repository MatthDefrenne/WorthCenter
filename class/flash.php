<?php

class flash {

    public static function setFlash($name, $value) {
        session_start();
        $_SESSION[$name] = $value;
    }

}