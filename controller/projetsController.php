<?php


class projetsController extends \Slim\Slim
{
    public static function projets()
    {
        $slim = \Slim\Slim::getInstance();
        $projets = \WorthCenter\projectsManager::getAllProject();
        $slim->render('projets.php', array(
            "projets" => $projets
        ));
    }
}