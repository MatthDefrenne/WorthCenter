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
        $_SESSION['6K1K2M6Z8mH1KUku5vWm70l0aRf0B8WK'] = "$mount";
        $slim->render('submitformule.php', array(
            "mount" => $mount
    ));
    }
    public static function addCreditToAmount($mount)
    {
        $slim = \Slim\Slim::getInstance();
        R::exec( 'UPDATE users SET solde = solde +'.$mount.' WHERE id = '.$slim->getCookie('user'));
        $slim->redirect('membre');
    }
}