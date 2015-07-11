<?php


class formulesController extends \Slim\Slim
{
    public static function formules()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('formules.php');
    }
}