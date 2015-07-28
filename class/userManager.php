<?php

namespace WorthCenter;

use Slim\Slim;

class userManager extends user
{
    public static function addUser(user $user)
    {

        $addUser = \R::dispense('users');
        $addUser->email = $user->email;
        $addUser->pseudo = $user->pseudo;
        $addUser->password = $user->password;
        $addUser->timestamp = new \DateTime();
        \R::store($addUser);
    }

    public static function getCredit()
    {
        $slim = Slim::getInstance();
        $user = new userArea($slim->getCookie('user'));
        $credit = $user->selectInformationsForUserArea();

        return $credit[1]['solde'];

    }

    public static function removeCreditFromAccount($amount)
    {
        $slim = Slim::getInstance();
        if (self::getCredit() <= $amount) {
            \flash::setFlash('value', 'Vous n\'avez pas cette somme sur votre compte. Pour rajouter des fonds, ajouter des credits à votre compte');

        } else {
            \R::exec('UPDATE users SET solde = solde -' . $amount . ' WHERE id = ' . $slim->getCookie('user'));

        }
    }

    public static function selectCountMessageNoRead()
    {
        $slim = Slim::getInstance();
        $id = $slim->getCookie('user');

        $count = \R::getAll('SELECT COUNT(*) as messagenoread FROM messages WHERE id_to = :id AND see = 0', [':id' => $id]);
        return $count[0]['messagenoread'];
    }

    public static function selectRecevedMessage()
    {
        $slim = Slim::getInstance();
        $id = $slim->getCookie('user');

        $table = array();

        $userRecevedMessage = \R::findAndExport('messages', 'id_to = ?', [$id]);

        return $userRecevedMessage;
    }
    public static function selectedSendMessage() {

        $slim = Slim::getInstance();
        $id = $slim->getCookie('user');

        $table = array();

        $userSendMessage  = \R::findAndExport('messages', 'id_from = ?', [$id]);

        return $userSendMessage;
    }


}