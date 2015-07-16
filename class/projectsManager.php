<?php
namespace WorthCenter;

class projectsManager extends \WorthCenter\projects
{


    public static function getThreeLastProject()
    {
        return \R::getAll('SELECT * FROM projects ORDER BY id LIMIT 3');
    }

    public static function getAllProject()
    {
        return \R::getAll('SELECT * FROM projects');
    }

    public static function addProjets(projects $project)
    {
        $addProjects = \R::dispense('projects');
        $addProjects->title = $project->title;
        $addProjects->mountneeded = $project->mountneeded;
        $addProjects->roi = $project->roi;
        $addProjects->description = $project->description;
        $addProjects->timestamp = new \DateTime();
        \R::store($addProjects);
    }

    public static function delProject($id)
    {
        $project = \R::load( 'projects', $id);
        \R::trash( $project );
    }
    public static function getProjectById($id)
    {
        return \R::findAndExport( 'projects', 'id = '.$id);
    }
}

?>