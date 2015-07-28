<?php

namespace WorthCenter;

class projects
{

    protected $title,
        $mountneeded,
        $roi,
        $description;

    public function __construct(array $POST)
    {
        $this->title = $POST['title'];
        $this->mountneeded = $POST['mountneeded'];
        $this->roi = $POST['roi'];
        $this->description = $POST['description'];
    }


}

?>