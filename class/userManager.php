<?php

namespace WorthCenter;


class userManager extends user
{
    public static function addUser(user $user) {

        $addUser = \R::dispense('users');
        $addUser->email = $user->email;
        $addUser->pseudo = $user->pseudo;
        $addUser->password = $user->password;
        $addUser->timestamp = new \DateTime();
        \R::store($addUser);
    }

    public static function updateUser() {

    }

    public static function getUserById($id) {

    }

}