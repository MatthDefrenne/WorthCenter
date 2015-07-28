<?php

class membreController extends \Slim\Slim
{
    public static function userArea()
    {

        $slim = \Slim\Slim::getInstance();

        $userArea = new \WorthCenter\userArea($slim->getCookie('user'));

        $informations = $userArea->selectInformationsForUserArea();
        $projects = $userArea->selectProjectsinvestissmentsActive();
        $projectsOver = $userArea->selectProjectsinvestissmentsOver();
        $messageNoRead = \WorthCenter\userManager::selectCountMessageNoRead();

        if(empty($projects)) {
            $projects = array(
                "empty" => "Aucun invessissements en cours !"
            );
        }

        if(empty($projectsOver)) {
            $projectsOver = array(
                "empty" => "Vous n'avez pas investis dernièrement dans un projet !"
            );
        }

        $slim->render('membre.php', array(
            'informations' => $informations,
            'projects' => $projects,
            'projectsOver' => $projectsOver,
            'messageNoRead' => $messageNoRead
        ));

    }
}