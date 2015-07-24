<?php


class formulesController extends \Slim\Slim
{


    public static function formules()
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('formules.php');
    }

    public static function createFormulaire($mount)
    {
        $slim = \Slim\Slim::getInstance();
        $slim->render('submitformule.php', array(
            "mount" => $mount
    ));
    }
    public static function addCreditToAccount()
    {
        $slim = \Slim\Slim::getInstance();
        $amount = $_SESSION['6K1K2M6Z8mH1KUku5vWm70l0aRf0B8WK'];
        R::exec( 'UPDATE users SET solde = solde +'.$amount.' WHERE id = '.$slim->getCookie('user'));
        $slim->redirect('membre');
    }
}