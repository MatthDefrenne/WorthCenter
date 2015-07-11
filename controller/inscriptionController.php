<?php

class inscriptionController extends \Slim\Slim
{
    public static function index()
    {

        $slim = \Slim\Slim::getInstance();
        $slim->render('inscription.php');
    }


    public static function subscribe()
    {
        $slim = \Slim\Slim::getInstance();
        if ($_POST['Motdepasse'] != $_POST['MotdepasseConfirmation']) {
            $slim->redirect('inscription');
            flash::setFlash('subscribe', "Les deux mots de passe ne sont pas identiques !");
        } else {
            if (empty($_POST['Pseudonyme']) || empty($_POST['AdresseEmail'])
                || empty($_POST['Motdepasse']) || empty($_POST['MotdepasseConfirmation'])
            ) {
                flash::setFlash('subscribe', "Merci de remplire correctement tous les champs");
            } else {
                $user = new \WorthCenter\user(array(
                    "pseudo" => $_POST['Pseudonyme'],
                    "password" => sha1($_POST['Motdepasse']),
                    "email" => $_POST['AdresseEmail'],
                ));
                if ($user->checkIsExist()) {
                    flash::setFlash('subscribe', "Cette email est déjà prise !");
                } else {
                    \WorthCenter\userManager::addUser($user);
                    flash::setFlash('subscribe', "Vous êtes bien inscris !");
                }

            }
            $slim->redirect('inscription');
        }
    }
}
