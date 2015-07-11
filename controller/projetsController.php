<?php


class projetsController extends \Slim\Slim
{
    public static function projets()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('projets.php');
    }
}