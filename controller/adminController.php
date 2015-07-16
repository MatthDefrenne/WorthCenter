<?php


class adminController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $projets = \WorthCenter\projectsManager::getAllProject();
        $slim->render('admin.php', array(
            "projets" => $projets
        ));
    }

    public static function addProject()
    {
        $slim = \Slim\Slim::getInstance();
        $project = new \WorthCenter\projects($_POST);
        \WorthCenter\projectsManager::addProjets($project);
        $slim->redirect('admin');
    }

    public static function delProject($id)
    {
        $slim = \Slim\Slim::getInstance();
        \WorthCenter\projectsManager::delProject($id);
        $slim->redirect('../admin');
    }

    public static function getProjectById($id)
    {
        $slim = \Slim\Slim::getInstance();
        $modifProject = \WorthCenter\projectsManager::getProjectById($id);
        $slim->render('modifProject.php', array(
            "modifProject" => $modifProject
        ));
    }

    public static function saveProjectModification($id)
    {
        $slim = \Slim\Slim::getInstance();
        $projectModified = R::load( 'projects', $id);
        $projectModified->title = $_POST['title'];
        $projectModified->mountneeded = $_POST['mountneeded'];
        $projectModified->roi = $_POST['roi'];
        $projectModified->description = $_POST['description'];
        R::store($projectModified);
        $slim->redirect('../admin');
    }
}