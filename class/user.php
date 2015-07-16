<?php
namespace WorthCenter;

class user
{
    protected $email;
    protected $password;
    protected $firstname;
    protected $name;
    protected $roles;
    protected $pseudo;

    public function __construct(array $user)
    {
        // Hydrating...
        if (isset($user)) {
            foreach ($user as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function checkEmailIsExist() {
        $user  = \R::find( 'users', ' email = :email ', [ ':email' => $this->email ] );
        if($user) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPseudoIsExist() {
        $user  = \R::find( 'users', ' pseudo = :pseudo ', [ ':pseudo' => $this->pseudo ] );
        if($user) {
            return true;
        } else {
            return false;
        }
    }

    public function createSession() {
        $user  = \R::getAll('SELECT * FROM users  WHERE email = :email AND password = :password ',
            [ ':email' => $this->email, ':password' => $this->password]);
        if($user) {
            setcookie("user", $user[0]['id'], time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("roles", sha1($user[0]['roles']), time() + (86400 * 30), "/"); // 86400 = 1 day
            return true;
            } else {
            return false;
        }
    }


}