<?php

namespace WorthCenter;

class userArea
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function selectProjectsinvestissmentsActive()
    {
        return \R::getAll('SELECT * FROM projects INNER JOIN investedproject ON investedproject.idproject = projects.id WHERE investedproject.id = ? AND projects.active = 1', [$this->id]);

    }

    public function selectProjectsinvestissmentsOver()
    {
        return \R::getAll('SELECT * FROM projects INNER JOIN investedproject ON investedproject.idproject = projects.id WHERE investedproject.id = ? AND projects.active = 0', [$this->id]);
    }

    public function selectInformationsForUserArea()
    {
        return \R::findAll('users', ' id  = :id ', [':id' => $this->id]);
    }
}