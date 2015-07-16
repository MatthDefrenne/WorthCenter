<?php

class profilController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $users = new \WorthCenter\userArea($slim->getCookie('user'));
        $informations = $users->selectInformationsForUserArea();

        $slim->render('profil.php', array(
            'informations' => $informations
        ));
    }

    public static function save()
    {
        $slim = \Slim\Slim::getInstance();
        $image = new imageManager("avatar");
        $image->setFormat("jpg")
              ->setNameImage($slim->getCookie("user"))
              ->setSavePath("uploads/")
              ->save();
        $users = R::load('users', $slim->getCookie('user'));
        $users->firstname = $_POST['fname'];
        $users->description = $_POST['description'];
        $users->name = $_POST['sname'];
        $users->facebook = $_POST['facebook'];
        $users->twitter = $_POST['twitter'];
        $users->avatar = "http://127.0.0.1/WorthCenter/uploads/" . $slim->getCookie("user") . ".jpg";
        R::store($users);
        $slim->redirect("profil");

    }
}