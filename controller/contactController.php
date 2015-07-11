<?php


class contactController extends \Slim\Slim
{
    public static function contact()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('contact.php');
    }
}