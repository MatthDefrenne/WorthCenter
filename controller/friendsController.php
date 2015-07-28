<?php
class friendsController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('friends.php');
    }
}