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
            flash::setFlash('subscribe', "Les deux mots de passe ne sont pas identiques !");
        } else {
            if (empty($_POST['Pseudonyme'])) {
                flash::setFlash('subscribe', "Merci de remplire le champs pseudonyme !");
            } else if (empty($_POST['Motdepasse'])) {
                flash::setFlash('subscribe', "Merci de renseigner un mot de passe !");
            } else if (empty($_POST['AdresseEmail'])) {
                flash::setFlash('subscribe', "Merci de renseigner une adresse email !");
            } else if (!filter_var($_POST['AdresseEmail'],FILTER_VALIDATE_EMAIL)) {
                flash::setFlash('subscribe', "Merci de renseigner une adresse email valide !");
            } else {
                $user = new \WorthCenter\user(array(
                    "pseudo" => $_POST['Pseudonyme'],
                    "password" => sha1($_POST['Motdepasse']),
                    "email" => $_POST['AdresseEmail'],
                ));
                if ($user->checkEmailIsExist()) {
                    flash::setFlash('subscribe', "Cette email est déjà prise !");
                } else if($user->checkPseudoIsExist()) {
                    flash::setFlash('subscribe', "Ce pseudo est déjà pris !");
                } else {
                    \WorthCenter\userManager::addUser($user);
                    flash::setFlash('subscribe', "Vous êtes bien inscris !");
                }

            }
        }
        $slim->redirect('inscription');
    }
}
