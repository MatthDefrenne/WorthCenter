<?php
class messageController extends \Slim\Slim
{
    public static function index()
    {
        $slim = \Slim\Slim::getInstance();
        $users = new \WorthCenter\userArea($slim->getCookie('user'));
        $informations = $users->selectInformationsForUserArea();
        $messageNoRead = \WorthCenter\userManager::selectCountMessageNoRead();
        $recevedMessage = \WorthCenter\userManager::selectRecevedMessage();
        $sendMessage = \WorthCenter\userManager::selectedSendMessage();


        $slim->render('message.php', array(
            'informations' => $informations,
            'messageNoRead' => $messageNoRead,
            'recevedMessage' => $recevedMessage,
            'sendMessage' => $sendMessage
        ));
    }

    private static function getIdByPseudo($name) {
        $user = \R::findOne( 'users', ' pseudo LIKE ? ', [ $name ] );
        if(!$user) {
            return false;
        } else {
            return $user->id;
        }
    }

    public static function readAllMessage() {
        $slim = \Slim\Slim::getInstance();
        \R::exec('UPDATE messages SET see = 1 WHERE id_to = '.$slim->getCookie('user'));
    }

    public static function sendMessage(){
        $slim = \Slim\Slim::getInstance();


        if(!self::getIdByPseudo($_POST['destination'])) {
            flash::setFlash('error', 'Aucune personne trouvé avec ce nom.');

        } else {
            $sendMessage = \R::dispense('messages');
            $sendMessage->id_to = self::getIdByPseudo($_POST['destination']);
            $sendMessage->id_from =  $slim->getCookie('user');
            $sendMessage->message = $_POST['message'];
            \R::store($sendMessage);
        }

        $slim->redirect('message');



    }

}