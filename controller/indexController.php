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
        $projets = \WorthCenter\projectsManager::getThreeLastProject();
        $slim->render('derniers_projets.php', array(
            'projets' => $projets,
        ));
    }
}