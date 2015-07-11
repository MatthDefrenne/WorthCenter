<?php


class connexionController extends \Slim\Slim
{
    public static function connexion()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('connexion.php');
    }
}