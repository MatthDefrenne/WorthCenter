<?php


class membreController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('membre.php');
    }
}