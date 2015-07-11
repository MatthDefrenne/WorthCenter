<?php


class indexController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('accueil.php');
    }

    public static function derniersProjets()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('derniers_projets.php');
    }
}