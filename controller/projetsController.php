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
    public static function showInfosProjet($id)
    {
        $slim = \Slim\Slim::getInstance();
        $infosProject = \WorthCenter\projectsManager::getProjectById($id);
        $projectInvestissement = \WorthCenter\projectsManager::selectProjectsinvestissments($id);
        if(empty($projectInvestissement)) {

            $projectInvestissement = array(
                "empty" => "Aucun investissement n'as été attribué à ce projet"
            );
        }
        $slim->render('showproject.php', array(
            "infosProject" => $infosProject,
            "projectInvestissement" => $projectInvestissement
        ));
    }

    public static function addCreditToProject($id) {

        $slim = \Slim\Slim::getInstance();
        $credit = \WorthCenter\userManager::getCredit();
        if($credit <= $_POST['amount']) {
            \flash::setFlash('value', 'Vous n\'avez pas cette somme sur votre compte. Pour rajouter des fonds, ajouter des credits à votre compte');
        } else {
            \WorthCenter\projectsManager::addCreditToProjectById($id, $_POST['amount']);
            \WorthCenter\userManager::removeCreditFromAccount($_POST['amount']);
            \WorthCenter\projectsManager::AddinvestissmentToProject($id, $_POST['amount']);
        }
        $slim->redirect($slim->request()->getRootUri().'/showproject/'.$id);


    }
}