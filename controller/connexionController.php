<?php


class connexionController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('connexion.php');
    }

    public static function connexion()
    {
        $slim = \Slim\Slim::getInstance();

        $user = new \WorthCenter\user(array(
            "password" => sha1($_POST['Motdepasse']),
            "email" => $_POST['AdresseEmail'],
        ));
        if ($user->createSession()) {
            $slim->redirect('membre');
        } else {
            flash::setFlash('subscribe', "Email ou mot de passe incorrecte.");
            $slim->redirect('connexion');
        }
    }
}