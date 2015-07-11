<?php


class conceptController extends \Slim\Slim
{
	public static function concept()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('concept.php');
    }
}