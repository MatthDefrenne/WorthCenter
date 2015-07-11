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

    public function checkIsExist() {
        $user  = \R::find( 'users', ' email = :email ', [ ':email' => $this->email ] );
        if($user) {
            return true;
        } else {
            return false;
        }

    }

}